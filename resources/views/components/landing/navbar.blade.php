<nav
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50 border-b border-slate-200 bg-white/80 backdrop-blur-md"
    role="navigation"
    aria-label="Main navigation"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <x-landing.logo />

            <div class="hidden md:flex md:items-center md:gap-8">
                <a href="#features" class="text-sm font-medium text-slate-600 transition hover:text-slate-900">Features</a>
                <a href="#how-it-works" class="text-sm font-medium text-slate-600 transition hover:text-slate-900">How It Works</a>
                <a href="#security" class="text-sm font-medium text-slate-600 transition hover:text-slate-900">Security</a>
                <a href="#self-host" class="text-sm font-medium text-slate-600 transition hover:text-slate-900">Self-Host</a>
            </div>

            <div class="hidden items-center gap-3 md:flex">
                <a href="#" class="text-slate-500 transition hover:text-slate-700" aria-label="View on GitHub">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z" clip-rule="evenodd" />
                    </svg>
                </a>
                <a href="#" class="text-sm font-medium text-slate-600 transition hover:text-slate-900">Login</a>
                <a href="#" class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Get Started
                </a>
            </div>

            <button
                @click="mobileOpen = !mobileOpen"
                class="inline-flex items-center justify-center rounded-md p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700 md:hidden"
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
        class="border-t border-slate-200 bg-white md:hidden"
        role="navigation"
        aria-label="Mobile navigation"
    >
        <div class="space-y-1 px-4 py-4">
            <a href="#features" class="block rounded-md px-3 py-2 text-base font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900">Features</a>
            <a href="#how-it-works" class="block rounded-md px-3 py-2 text-base font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900">How It Works</a>
            <a href="#security" class="block rounded-md px-3 py-2 text-base font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900">Security</a>
            <a href="#self-host" class="block rounded-md px-3 py-2 text-base font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900">Self-Host</a>
            <div class="border-t border-slate-200 pt-4">
                <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900">Login</a>
                <a href="#" class="mt-2 block rounded-md bg-indigo-600 px-3 py-2 text-center text-base font-semibold text-white hover:bg-indigo-500">Get Started</a>
            </div>
        </div>
    </div>
</nav>