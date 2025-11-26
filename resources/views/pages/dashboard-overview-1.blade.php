@extends('../themes/' . $activeTheme)

@section('subhead')
    <title>Master Boilerplate - Dashboard</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Bienvenido al Master Boilerplate
                </h2>
            </div>
            
            <div class="intro-y box p-5 mt-5">
                <div class="text-slate-500">
                    Este es tu lienzo en blanco. El layout base (Sidebar, Topbar) ya está funcionando.
                    <br>
                    Comienza a construir tus módulos aquí.
                </div>
            </div>
        </div>
    </div>
@endsection
