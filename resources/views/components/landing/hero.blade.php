<section class="relative overflow-hidden hero-gradient">
    {{-- Decorative grid pattern --}}
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%236366f1&quot; fill-opacity=&quot;0.04&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-60"></div>

    {{-- Floating orbs --}}
    <div class="absolute top-20 left-10 h-72 w-72 animate-float rounded-full bg-indigo-500/5 blur-3xl"></div>
    <div class="absolute bottom-20 right-10 h-96 w-96 animate-float rounded-full bg-violet-500/5 blur-3xl" style="animation-delay: -3s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 pb-20 pt-16 sm:px-6 sm:pt-20 lg:px-8 lg:pb-28 lg:pt-24">
        <div class="lg:grid lg:grid-cols-12 lg:gap-16">
            <div class="lg:col-span-5 lg:flex lg:flex-col lg:justify-center">
                {{-- Badge --}}
                <div class="mb-6 inline-flex items-center gap-2 rounded-full border border-indigo-200/60 bg-indigo-50/80 px-4 py-1.5 text-xs font-medium text-indigo-700 shadow-sm shadow-indigo-100/50 backdrop-blur-sm">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-indigo-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-indigo-500"></span>
                    </span>
                    Secure environment management
                </div>

                {{-- Headline --}}
                <h1 class="text-4xl font-bold tracking-tight text-slate-900 sm:text-5xl lg:text-5xl xl:text-6xl">
                    Stop asking for the
                    <span class="relative inline-block">
                        <span class="relative z-10 rounded-lg bg-gradient-to-r from-indigo-600 to-violet-600 px-3 py-1 font-mono text-sm font-bold text-white shadow-lg shadow-indigo-500/25 sm:text-base xl:text-lg">.env</span>
                    </span>
                    file.
                </h1>

                {{-- Subheadline --}}
                <p class="mt-6 text-lg leading-relaxed text-slate-600">
                    The secure way to store, manage, and share environment variables across your development teams and projects.
                </p>

                {{-- CTAs --}}
                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                    <a href="/app" class="group relative inline-flex items-center justify-center overflow-hidden rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-indigo-500/25 transition-all duration-300 hover:shadow-xl hover:shadow-indigo-500/30 hover:scale-[1.02] focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        <span class="relative z-10">Get Started Free</span>
                        <svg class="relative z-10 ml-2 h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                        </svg>
                    </a>
                    <a href="https://github.com/dipesh79/np.com.khanaldipesh.envvault" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white/80 px-7 py-3.5 text-sm font-semibold text-slate-700 shadow-sm backdrop-blur-sm transition-all duration-300 hover:border-slate-300 hover:bg-white hover:shadow-md">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0 1 12 6.844a9.59 9.59 0 0 1 2.504.337c1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.02 10.02 0 0 0 22 12.017C22 6.484 17.522 2 12 2Z" clip-rule="evenodd" />
                        </svg>
                        View on GitHub
                    </a>
                </div>

                {{-- Social proof --}}
                <div class="mt-8 flex items-center gap-4">
                    <div class="flex -space-x-2">
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gradient-to-br from-indigo-400 to-indigo-600 text-xs font-bold text-white shadow-sm">D</div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gradient-to-br from-violet-400 to-violet-600 text-xs font-bold text-white shadow-sm">A</div>
                        <div class="flex h-8 w-8 items-center justify-center rounded-full border-2 border-white bg-gradient-to-br from-emerald-400 to-emerald-600 text-xs font-bold text-white shadow-sm">S</div>
                    </div>
                    <div class="text-xs text-slate-500">
                        <span class="font-semibold text-slate-700">Trusted by developers</span> who care about security
                    </div>
                </div>
            </div>

            {{-- Hero mockup --}}
            <div class="mt-12 lg:col-span-7 lg:mt-0">
                <div class="terminal-glow animate-slide-up rounded-2xl border border-slate-200/60 bg-white/90 backdrop-blur-sm transition-all duration-500">
                    {{-- Title bar --}}
                    <div class="flex items-center gap-2 border-b border-slate-100 px-5 py-3.5">
                        <div class="flex gap-1.5">
                            <span class="h-3 w-3 rounded-full bg-red-400 shadow-inner"></span>
                            <span class="h-3 w-3 rounded-full bg-amber-400 shadow-inner"></span>
                            <span class="h-3 w-3 rounded-full bg-green-400 shadow-inner"></span>
                        </div>
                        <div class="ml-3 flex items-center gap-2 rounded-md bg-slate-100/80 px-3 py-1">
                            <svg class="h-3.5 w-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <span class="text-xs font-medium text-slate-500">envvault</span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5 sm:p-6">
                        <div class="grid gap-5 sm:grid-cols-2">
                            {{-- Left: Web app nav --}}
                            <div class="space-y-3">
                                <div class="rounded-xl border border-slate-200/80 bg-white p-4 shadow-sm">
                                    <div class="mb-3 flex items-center gap-2">
                                        <div class="flex h-6 w-6 items-center justify-center rounded-md bg-indigo-100">
                                            <svg class="h-3.5 w-3.5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                            </svg>
                                        </div>
                                        <span class="text-xs font-semibold text-slate-900">EnvVault</span>
                                    </div>
                                    <div class="space-y-2 text-xs text-slate-500">
                                        <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2">
                                            <span>Projects</span>
                                            <span class="font-semibold text-indigo-600">3</span>
                                        </div>
                                        <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2">
                                            <span>Environments</span>
                                            <span class="font-semibold text-indigo-600">9</span>
                                        </div>
                                        <div class="flex items-center justify-between rounded-lg bg-slate-50 px-3 py-2">
                                            <span>Team Members</span>
                                            <span class="font-semibold text-indigo-600">5</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center gap-2 text-xs text-slate-500">
                                    <svg class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                    </svg>
                                    <span>Encrypted &bull; RBAC &bull; Audit logs</span>
                                </div>
                            </div>

                            {{-- Right: Project view --}}
                            <div class="space-y-3">
                                <div class="flex items-center gap-2 text-sm text-slate-900">
                                    <svg class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                    </svg>
                                    <span class="font-semibold">Laravel CRM</span>
                                </div>

                                <div class="text-xs font-medium text-slate-500">Environments</div>

                                <div class="rounded-xl border border-slate-200/80 bg-gradient-to-r from-emerald-50/50 to-white p-3.5 shadow-sm transition-all duration-200 hover:border-emerald-200 hover:shadow">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">Local</div>
                                            <div class="text-xs text-slate-500">Updated 2m ago</div>
                                        </div>
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-100 text-emerald-600">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="rounded-xl border border-slate-200/80 bg-gradient-to-r from-blue-50/50 to-white p-3.5 shadow-sm transition-all duration-200 hover:border-blue-200 hover:shadow">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">Staging</div>
                                            <div class="text-xs text-slate-500">Updated 1h ago</div>
                                        </div>
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-100 text-blue-600">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>

                                <div class="rounded-xl border border-amber-200/60 bg-gradient-to-r from-amber-50/50 to-white p-3.5 shadow-sm transition-all duration-200 hover:border-amber-200 hover:shadow">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">Production</div>
                                            <div class="flex items-center gap-1.5 text-xs text-amber-600">
                                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                                </svg>
                                                Protected
                                            </div>
                                        </div>
                                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-amber-100 text-amber-600">
                                            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
