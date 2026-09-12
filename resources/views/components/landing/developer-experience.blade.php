<section class="relative overflow-hidden border-b border-slate-200/60 bg-slate-50/40">
    <div class="absolute inset-0 mesh-gradient opacity-30"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="lg:grid lg:grid-cols-2 lg:gap-16">
            <div class="flex flex-col justify-center">
                <div class="mb-4 inline-flex w-fit items-center gap-2 rounded-full border border-cyan-200/60 bg-cyan-50/80 px-4 py-1.5 text-xs font-medium text-cyan-700">
                    <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                    </svg>
                    Developer Experience
                </div>
                <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                    Built for developers, not administrators.
                </h2>
                <p class="mt-5 text-lg leading-relaxed text-slate-600">
                    The EnvVault web application is designed with developers in mind. The CLI and API are coming soon — the web experience is available today.
                </p>
                <div class="mt-6 flex flex-wrap items-center gap-3">
                    <div class="flex items-center gap-2 rounded-lg bg-emerald-50 px-3 py-1.5 text-sm font-medium text-emerald-700 ring-1 ring-emerald-200/50">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        Web interface
                    </div>
                    <div class="flex items-center gap-2 rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-medium text-slate-500 ring-1 ring-slate-200/50">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        CLI coming soon
                    </div>
                    <div class="flex items-center gap-2 rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-medium text-slate-500 ring-1 ring-slate-200/50">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        API coming soon
                    </div>
                </div>
            </div>

            <div class="mt-10 lg:mt-0">
                <div class="relative">
                    <div class="terminal-glow rounded-2xl border border-slate-200/60 bg-white transition-all duration-500 opacity-60 blur-[1px]">
                        <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3.5">
                            <div class="flex gap-1.5">
                                <span class="h-3 w-3 rounded-full bg-red-400 shadow-inner"></span>
                                <span class="h-3 w-3 rounded-full bg-amber-400 shadow-inner"></span>
                                <span class="h-3 w-3 rounded-full bg-green-400 shadow-inner"></span>
                            </div>
                            <div class="ml-3 flex items-center gap-2 rounded-md bg-slate-100/80 px-3 py-1">
                                <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m6.75 7.5 3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0 0 21 18V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v12a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                <span class="text-xs font-medium text-slate-500">terminal</span>
                            </div>
                        </div>
                        <div class="bg-slate-950 p-5 font-mono text-sm leading-relaxed text-slate-300 shadow-inner sm:p-6">
                            <div><span class="text-slate-500">$</span> <span class="text-slate-400">git clone</span> github.com/company/project</div>
                            <div><span class="text-slate-500">$</span> <span class="text-slate-400">cd</span> project</div>
                            <div class="mt-3"><span class="text-slate-500">$</span> <span class="text-indigo-400">envvault</span></div>
                            <div class="mt-2 flex items-center gap-2 text-emerald-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <span>Project detected</span>
                            </div>
                            <div class="mt-2 text-slate-500">Project: <span class="text-indigo-300">Laravel CRM</span></div>
                            <div class="text-slate-500">Environment: <span class="text-indigo-300">Local</span></div>
                            <div class="mt-2 flex items-center gap-2 text-emerald-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <span>Environment available</span>
                            </div>
                            <div class="mt-2 text-slate-500">Syncing <span class="text-amber-300">24</span> variables to <span class="text-slate-300">.env</span></div>
                            <div class="mt-1 flex items-center gap-2 text-emerald-400">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg>
                                <span>Done! Ready to code.</span>
                            </div>
                        </div>
                    </div>

                    {{-- Coming Soon overlay --}}
                    <div class="absolute inset-0 z-10 flex items-center justify-center">
                        <div class="rounded-2xl bg-white/90 px-6 py-3 shadow-lg backdrop-blur-sm">
                            <div class="flex items-center gap-2">
                                <svg class="h-5 w-5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="text-sm font-semibold text-slate-700">CLI coming soon</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
