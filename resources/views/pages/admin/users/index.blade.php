@extends('../themes/' . $activeTheme)

@section('subhead')
    <title>Usuarios</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-x-6 gap-y-10">
        <div class="col-span-12">
            <div class="flex flex-col gap-y-3 md:h-10 md:flex-row md:items-center">
                <div class="text-base font-medium">
                    Usuarios
                </div>
                <div class="flex flex-col gap-x-3 gap-y-2 sm:flex-row md:ml-auto">
                    <a href="{{ route('admin.users.create') }}">
                        <x-base.button variant="primary">
                            <x-base.lucide class="mr-2 h-4 w-4 stroke-[1.3]" icon="UserPlus" />
                            Nuevo usuario
                        </x-base.button>
                    </a>
                </div>
            </div>

            <div class="mt-6 box box--stacked flex flex-col">
                <div class="overflow-auto xl:overflow-visible">
                    <x-base.table class="border-b border-slate-200/60">
                        <x-base.table.thead>
                            <x-base.table.tr>
                                <x-base.table.td class="border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                    Nombre
                                </x-base.table.td>
                                <x-base.table.td class="border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                    Email
                                </x-base.table.td>
                                <x-base.table.td class="border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500">
                                    Rol
                                </x-base.table.td>
                                <x-base.table.td class="w-48 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500">
                                    Acciones
                                </x-base.table.td>
                            </x-base.table.tr>
                        </x-base.table.thead>
                        <x-base.table.tbody>
                            @foreach ($appUsers as $u)
                                <x-base.table.tr class="[&_td]:last:border-b-0">
                                    <x-base.table.td class="border-dashed py-4 dark:bg-darkmode-600">
                                        {{ $u->name }}
                                    </x-base.table.td>
                                    <x-base.table.td class="border-dashed py-4 dark:bg-darkmode-600">
                                        {{ $u->email }}
                                    </x-base.table.td>
                                    <x-base.table.td class="border-dashed py-4 dark:bg-darkmode-600">
                                        {{ $userRoleNameByUserId[$u->id] ?? '-' }}
                                    </x-base.table.td>
                                    <x-base.table.td class="border-dashed py-4 text-center dark:bg-darkmode-600">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('admin.users.edit', $u) }}">
                                                <x-base.button variant="outline-secondary" size="sm">
                                                    Editar
                                                </x-base.button>
                                            </a>

                                            <form method="POST" action="{{ route('admin.users.destroy', $u) }}" onsubmit="return confirm('¿Eliminar usuario?');">
                                                @csrf
                                                @method('DELETE')
                                                <x-base.button variant="danger" size="sm">
                                                    Eliminar
                                                </x-base.button>
                                            </form>
                                        </div>
                                    </x-base.table.td>
                                </x-base.table.tr>
                            @endforeach
                        </x-base.table.tbody>
                    </x-base.table>
                </div>

                <div class="p-5">
                    {{ $appUsers->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
