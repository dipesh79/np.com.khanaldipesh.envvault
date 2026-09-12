<nav
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50 border-b border-slate-200/40 bg-white/70 backdrop-blur-xl supports-[backdrop-filter]:bg-white/50"
    role="navigation"
    aria-label="Main navigation"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <x-landing.logo />

            <div class="hidden items-center gap-1 md:flex">
                <a href="#features" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Features</a>
                <a href="#how-it-works" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">How It Works</a>
                <a href="#security" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Security</a>
                <a href="#self-host" class="rounded-lg px-3 py-2 text-sm font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Self-Host</a>
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <a href="/app" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 px-5 py-2 text-sm font-semibold text-white shadow-sm shadow-indigo-500/25 transition-all duration-300 hover:shadow-md hover:shadow-indigo-500/30 hover:scale-[1.02] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Get Started
                </a>
            </div>

            <button
                @click="mobileOpen = !mobileOpen"
                class="inline-flex items-center justify-center rounded-lg p-2 text-slate-500 transition-colors hover:bg-slate-100/60 hover:text-slate-700 md:hidden"
                :aria-expanded="mobileOpen"
                aria-controls="mobile-menu"
                aria-label="Toggle navigation menu"
            >
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <div
        id="mobile-menu"
        x-show="mobileOpen"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="border-t border-slate-200/40 bg-white/90 backdrop-blur-xl md:hidden"
        role="navigation"
        aria-label="Mobile navigation"
    >
        <div class="space-y-1 px-4 py-4">
            <a href="#features" class="block rounded-lg px-3 py-2.5 text-base font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Features</a>
            <a href="#how-it-works" class="block rounded-lg px-3 py-2.5 text-base font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">How It Works</a>
            <a href="#security" class="block rounded-lg px-3 py-2.5 text-base font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Security</a>
            <a href="#self-host" class="block rounded-lg px-3 py-2.5 text-base font-medium text-slate-600 transition-colors hover:bg-slate-100/60 hover:text-slate-900">Self-Host</a>
            <div class="border-t border-slate-200/60 pt-4">
                <a href="/app" class="mt-2 block rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 px-3 py-2.5 text-center text-base font-semibold text-white shadow-sm shadow-indigo-500/25 hover:shadow-md hover:shadow-indigo-500/30">Get Started</a>
            </div>
        </div>
    </div>
</nav>
