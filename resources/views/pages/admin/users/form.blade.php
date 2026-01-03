@extends('../themes/' . $activeTheme)

@section('subhead')
    <title>{{ $user ? 'Editar usuario' : 'Crear usuario' }}</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="col-span-12 sm:col-span-10 sm:col-start-2">
            <div class="flex items-center">
                <div class="text-base font-medium">
                    {{ $user ? 'Editar usuario' : 'Crear usuario' }}
                </div>
                <div class="ml-auto">
                    <a href="{{ route('admin.users.index') }}">
                        <x-base.button variant="outline-secondary">Regresar</x-base.button>
                    </a>
                </div>
            </div>

            <div class="mt-6 box box--stacked flex flex-col">
                <div class="p-7">
                    <form method="POST" action="{{ $user ? route('admin.users.update', $user) : route('admin.users.store') }}">
                        @csrf
                        @if ($user)
                            @method('PUT')
                        @endif

                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12">
                                <div class="font-medium">Nombre</div>
                                <x-base.form-input
                                    class="mt-2"
                                    type="text"
                                    name="name"
                                    value="{{ old('name', $user?->name) }}"
                                />
                                @error('name')
                                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <div class="font-medium">Email</div>
                                <x-base.form-input
                                    class="mt-2"
                                    type="email"
                                    name="email"
                                    value="{{ old('email', $user?->email) }}"
                                />
                                @error('email')
                                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <div class="font-medium">Password {{ $user ? '(dejar vacío para no cambiar)' : '' }}</div>
                                <x-base.form-input
                                    class="mt-2"
                                    type="password"
                                    name="password"
                                />
                                @error('password')
                                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-span-12">
                                <div class="font-medium">Rol</div>
                                <x-base.form-select class="mt-2" name="role">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" @selected(old('role', $selectedRole) === $role)>
                                            {{ $role }}
                                        </option>
                                    @endforeach
                                </x-base.form-select>
                                @error('role')
                                    <div class="mt-1 text-sm text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <x-base.button variant="primary">
                                Guardar
                            </x-base.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
