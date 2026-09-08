<section id="security" class="border-b border-slate-200 bg-slate-50/50">
    <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">
                Your secrets deserve better than a chat message.
            </h2>
            <p class="mt-4 text-lg text-slate-600">
                Environment files often contain sensitive credentials that should never be shared through unsecured channels.
            </p>
        </div>

        <div class="mt-16 grid gap-8 lg:grid-cols-2 lg:gap-16">
            <div>
                <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex items-center gap-1.5 border-b border-slate-100 px-4 py-3">
                        <span class="h-2.5 w-2.5 rounded-full bg-red-400"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-amber-400"></span>
                        <span class="h-2.5 w-2.5 rounded-full bg-green-400"></span>
                        <span class="ml-2 text-xs font-medium text-slate-400">.env</span>
                    </div>
                    <div class="p-5 font-mono text-sm leading-loose sm:p-6">
                        <div class="text-slate-500"># Sensitive values masked</div>
                        <div class="mt-1"><span class="text-slate-700">DATABASE_HOST</span>=<span class="text-slate-400">*****</span></div>
                        <div><span class="text-slate-700">DATABASE_PASSWORD</span>=<span class="text-slate-400">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                        <div><span class="text-slate-700">API_KEY</span>=<span class="text-slate-400">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                        <div><span class="text-slate-700">AWS_SECRET</span>=<span class="text-slate-400">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                        <div><span class="text-slate-700">JWT_SECRET</span>=<span class="text-slate-400">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                        <div><span class="text-slate-700">MAIL_PASSWORD</span>=<span class="text-slate-400">&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</span></div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col justify-center">
                <h3 class="text-xl font-semibold text-slate-900">Built-in security features</h3>
                <ul class="mt-6 space-y-4">
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Encrypted storage for all environment files</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Permission-based access control for teams and individuals</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Protected environments with restricted access</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Version history with change comparison</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Complete audit logs for all access and modifications</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="mt-0.5 h-5 w-5 shrink-0 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>
                        <span class="text-sm text-slate-600">Self-hosting for complete data control</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>