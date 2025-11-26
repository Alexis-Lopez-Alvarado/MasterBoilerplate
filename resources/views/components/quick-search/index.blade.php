<div
    id="quick-search"
    aria-hidden="true"
    tabindex="-1"
    @class([
        'modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 overflow-y-hidden z-[60]',
        '[&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0',
        '[&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.1s]',
    ])
>
    <div
        class="relative mx-auto my-2 w-[95%] scale-95 transition-transform group-[.show]:scale-100 sm:mt-40 sm:w-[600px] lg:w-[700px]">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex w-12 items-center justify-center">
                <x-base.lucide
                    class="-mr-1.5 h-5 w-5 stroke-[1] text-slate-500"
                    icon="Search"
                />
            </div>
            <x-base.form-input
                class="rounded-lg border-0 py-3.5 pl-12 pr-14 shadow-xl focus:ring-0"
                type="text"
                placeholder="Buscar en el sistema..."
            />
            <div class="absolute inset-y-0 right-0 flex w-14 items-center justify-center">
                <div
                    class="mr-auto rounded-[0.25rem] bg-slate-100 px-1.5 py-px text-xs text-slate-500 border border-slate-300/60">
                    ESC
                </div>
            </div>
        </div>
        {{-- Resultados de búsqueda eliminados para limpieza --}}
    </div>
</div>
