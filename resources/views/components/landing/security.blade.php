<section id="security" class="relative overflow-hidden border-b border-slate-200/60">
    <div class="absolute inset-0 mesh-gradient opacity-40"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-emerald-200/60 bg-emerald-50/80 px-4 py-1.5 text-xs font-medium text-emerald-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                </svg>
                Security
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                Your secrets deserve better than a chat message.
            </h2>
            <p class="mt-5 text-lg text-slate-600">
                Environment files often contain sensitive credentials that should never be shared through unsecured channels.
            </p>
        </div>

        <div class="mt-16 grid gap-8 lg:grid-cols-2 lg:gap-12">
            {{-- Masked env file --}}
            <div class="group">
                <div class="terminal-glow rounded-2xl border border-slate-200/60 bg-white transition-all duration-500">
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
                            <span class="text-xs font-medium text-slate-500">.env</span>
                        </div>
                        <div class="ml-auto flex items-center gap-1.5">
                            <span class="flex h-5 items-center gap-1 rounded-md bg-emerald-100 px-2 text-[10px] font-semibold text-emerald-700">
                                <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                                Encrypted
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-5 sm:p-6">
                        <div class="rounded-xl bg-slate-950 p-5 font-mono text-sm leading-loose text-slate-300 shadow-inner">
                            <div class="text-slate-500"># All values are encrypted along with key</div>
                            <div class="mt-2">
                                <span class="text-indigo-400">APP_NAME</span>=<span class="text-emerald-400">EnvVault</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">APP_ENV</span>=<span class="text-emerald-400">production</span>
                            </div>
                            <div class="mt-2">
                                <span class="text-indigo-400">DATABASE_HOST</span>=<span class="text-slate-600">******</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">DATABASE_PASSWORD</span>=<span class="text-slate-600">••••••••••••</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">API_KEY</span>=<span class="text-slate-600">••••••••••••••••</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">AWS_SECRET</span>=<span class="text-slate-600">••••••••••••••••</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">JWT_SECRET</span>=<span class="text-slate-600">••••••••••••••••</span>
                            </div>
                            <div>
                                <span class="text-indigo-400">MAIL_PASSWORD</span>=<span class="text-slate-600">••••••••••••</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Security features --}}
            <div class="flex flex-col justify-center">
                <h3 class="text-xl font-bold text-slate-900">Built-in security features</h3>
                <p class="mt-3 text-sm text-slate-600">
                    Every layer of EnvVault is designed with security in mind.
                </p>

                <ul class="mt-8 space-y-4">
                    <li class="group flex items-start gap-4 rounded-xl border border-transparent p-3 transition-all hover:border-slate-100 hover:bg-slate-50/50">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white shadow-sm shadow-indigo-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-slate-900">Encrypted Storage</span>
                            <p class="mt-0.5 text-xs text-slate-500">All environment values are encrypted at rest using AES-256.</p>
                        </div>
                    </li>

                    <li class="group flex items-start gap-4 rounded-xl border border-transparent p-3 transition-all hover:border-slate-100 hover:bg-slate-50/50">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 text-white shadow-sm shadow-violet-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-slate-900">Role-Based Access Control</span>
                            <p class="mt-0.5 text-xs text-slate-500">Granular permissions for teams across projects.</p>
                        </div>
                    </li>

                    <li class="group flex items-start gap-4 rounded-xl border border-transparent p-3 transition-all hover:border-slate-100 hover:bg-slate-50/50">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 text-white shadow-sm shadow-amber-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-slate-900">Protected Environments</span>
                            <p class="mt-0.5 text-xs text-slate-500">Production environments with restricted access and confirmation steps.</p>
                        </div>
                    </li>

                    <li class="group flex items-start gap-4 rounded-xl border border-transparent p-3 transition-all hover:border-slate-100 hover:bg-slate-50/50">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-slate-600 to-slate-700 text-white shadow-sm shadow-slate-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-slate-900">Complete Audit Logs</span>
                            <p class="mt-0.5 text-xs text-slate-500">Track every access and modification with immutable audit trails.</p>
                        </div>
                    </li>

                    <li class="group flex items-start gap-4 rounded-xl border border-transparent p-3 transition-all hover:border-slate-100 hover:bg-slate-50/50">
                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 text-white shadow-sm shadow-emerald-500/20">
                            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.737 5.1a3.375 3.375 0 0 1 2.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m0 3h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Zm-3 6h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Z" />
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-semibold text-slate-900">Self-Hosting</span>
                            <p class="mt-0.5 text-xs text-slate-500">Run on your own infrastructure for complete data sovereignty.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
