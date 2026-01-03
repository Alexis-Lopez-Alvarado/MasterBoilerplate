<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LaratrustRolesAndAdminSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::query()->firstOrCreate(
            ['name' => 'Admin'],
            ['display_name' => 'Admin', 'description' => 'Administrador']
        );

        Role::query()->firstOrCreate(
            ['name' => 'User'],
            ['display_name' => 'User', 'description' => 'Usuario']
        );

        $adminName = env('ADMIN_NAME');
        $adminEmail = env('ADMIN_EMAIL');
        $adminPassword = env('ADMIN_PASSWORD');

        if (!$adminName || !$adminEmail || !$adminPassword) {
            throw new \RuntimeException('Faltan variables ADMIN_NAME/ADMIN_EMAIL/ADMIN_PASSWORD en .env');
        }

        $adminUser = User::query()->firstOrCreate(
            ['email' => $adminEmail],
            ['name' => $adminName, 'password' => Hash::make($adminPassword)]
        );

        if ($adminUser->name !== $adminName) {
            $adminUser->name = $adminName;
        }

        if (!Hash::check($adminPassword, $adminUser->password)) {
            $adminUser->password = Hash::make($adminPassword);
        }

        if ($adminUser->isDirty()) {
            $adminUser->save();
        }

        DB::table('role_user')->updateOrInsert(
            [
                'role_id' => $adminRole->id,
                'user_id' => $adminUser->id,
                'user_type' => User::class,
            ],
            []
        );
    }
}
