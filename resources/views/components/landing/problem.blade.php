<section class="relative overflow-hidden border-b border-slate-200/60 bg-slate-50/40">
    <div class="absolute inset-0 mesh-gradient opacity-50"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-red-200/60 bg-red-50/80 px-4 py-1.5 text-xs font-medium text-red-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                </svg>
                The Problem
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                <span class="inline-block rounded-lg bg-gradient-to-r from-red-500 to-orange-500 px-3 py-1 font-mono text-sm font-bold text-white shadow-lg shadow-red-500/25 sm:text-base xl:text-lg">.env</span>
                files were never meant to be shared over chat.
            </h2>
            <p class="mt-5 text-lg text-slate-600">
                Every developer knows the pain. Here's how it usually goes.
            </p>
        </div>

        <div class="mt-16 grid gap-8 lg:grid-cols-2 lg:gap-12">
            {{-- Without EnvVault --}}
            <div class="group relative overflow-hidden rounded-2xl border border-red-200/40 bg-white p-6 shadow-sm transition-all duration-300 hover:shadow-md sm:p-8">
                <div class="absolute -right-16 -top-16 h-32 w-32 rounded-full bg-red-50 opacity-0 transition-opacity group-hover:opacity-100"></div>

                <div class="relative">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-red-100 text-red-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-red-500">Without EnvVault</h3>
                    </div>

                    <div class="space-y-0">
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-500">1</span>
                            <span class="text-sm text-slate-700">Clone the repository</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-red-100 text-xs font-bold text-red-500">2</span>
                            <span class="text-sm text-slate-700"><span class="font-mono text-xs text-red-500">.env</span> is missing</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-500">3</span>
                            <span class="text-sm text-slate-700">Ask teammate for the file</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-500">4</span>
                            <span class="text-sm text-slate-700">Search Slack for the file</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-slate-100 text-xs font-bold text-slate-500">5</span>
                            <span class="text-sm text-slate-700">Find an outdated copy</span>
                        </div>
                        <div class="flex items-center gap-4 py-3.5">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-red-100 text-xs font-bold text-red-500">6</span>
                            <span class="text-sm font-medium text-red-600">Copy values manually</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- With EnvVault --}}
            <div class="group relative overflow-hidden rounded-2xl border border-emerald-200/40 bg-white p-6 shadow-sm transition-all duration-300 hover:shadow-md sm:p-8">
                <div class="absolute -right-16 -top-16 h-32 w-32 rounded-full bg-emerald-50 opacity-0 transition-opacity group-hover:opacity-100"></div>

                <div class="relative">
                    <div class="mb-6 flex items-center gap-3">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                        <h3 class="text-sm font-semibold uppercase tracking-wider text-emerald-600">With EnvVault</h3>
                    </div>

                    <div class="space-y-0">
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">1</span>
                            <span class="text-sm text-slate-700">Clone the repository</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">2</span>
                            <span class="text-sm text-slate-700">Open EnvVault</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">3</span>
                            <span class="text-sm text-slate-700">Select your project</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">4</span>
                            <span class="text-sm text-slate-700">Select your environment</span>
                        </div>
                        <div class="flex items-center gap-4 border-b border-slate-100 py-3.5 transition-colors hover:bg-slate-50/50">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">5</span>
                            <span class="text-sm text-slate-700">Download <span class="font-mono text-xs">.env</span></span>
                        </div>
                        <div class="flex items-center gap-4 py-3.5">
                            <span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-lg bg-emerald-100 text-xs font-bold text-emerald-600">6</span>
                            <span class="text-sm font-medium text-emerald-600">Start coding</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-14 text-center">
            <p class="inline-flex items-center gap-2 rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-slate-900/20">
                <svg class="h-4 w-4 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                </svg>
                Less friction. Fewer mistakes. Better security.
            </p>
        </div>
    </div>
</section>
