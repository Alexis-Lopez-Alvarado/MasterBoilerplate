<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $appUsers = User::query()
            ->select(['id', 'name', 'email', 'created_at'])
            ->orderBy('id', 'desc')
            ->paginate(15);

        $roleUserRows = DB::table('role_user')
            ->select(['user_id', 'role_id'])
            ->where('user_type', User::class)
            ->get();

        $rolesById = Role::query()->pluck('name', 'id');

        $userRoleNameByUserId = [];
        foreach ($roleUserRows as $row) {
            $userRoleNameByUserId[$row->user_id] = $rolesById[$row->role_id] ?? null;
        }

        return view('pages/admin/users/index', [
            'appUsers' => $appUsers,
            'userRoleNameByUserId' => $userRoleNameByUserId,
        ]);
    }

    public function create(): View
    {
        return view('pages/admin/users/form', [
            'user' => null,
            'roles' => $this->allowedRoles(),
            'selectedRole' => 'User',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:Admin,User'],
        ]);

        $user = User::query()->create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $this->assignSingleRole($user, $validated['role']);

        return redirect()->route('admin.users.index');
    }

    public function edit(User $user): View
    {
        return view('pages/admin/users/form', [
            'user' => $user,
            'roles' => $this->allowedRoles(),
            'selectedRole' => $this->getSingleRoleName($user) ?? 'User',
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:8'],
            'role' => ['required', 'in:Admin,User'],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        $this->assignSingleRole($user, $validated['role']);

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    private function allowedRoles(): array
    {
        return ['Admin', 'User'];
    }

    private function getSingleRoleName(User $user): ?string
    {
        $roleId = DB::table('role_user')
            ->where('user_type', User::class)
            ->where('user_id', $user->id)
            ->value('role_id');

        if (!$roleId) {
            return null;
        }

        return Role::query()->whereKey($roleId)->value('name');
    }

    private function assignSingleRole(User $user, string $roleName): void
    {
        $roleId = Role::query()->where('name', $roleName)->value('id');

        if (!$roleId) {
            throw new \RuntimeException("El rol '{$roleName}' no existe");
        }

        DB::transaction(function () use ($user, $roleId) {
            DB::table('role_user')
                ->where('user_type', User::class)
                ->where('user_id', $user->id)
                ->delete();

            DB::table('role_user')->insert([
                'role_id' => $roleId,
                'user_id' => $user->id,
                'user_type' => User::class,
            ]);
        });
    }
}
