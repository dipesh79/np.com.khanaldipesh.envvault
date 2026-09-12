<section id="features" class="relative overflow-hidden border-b border-slate-200/60">
    {{-- Background decoration --}}
    <div class="absolute inset-0 mesh-gradient"></div>

    <div class="relative mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 lg:py-28">
        <div class="mx-auto max-w-3xl text-center">
            <div class="mb-4 inline-flex items-center gap-2 rounded-full border border-indigo-200/60 bg-indigo-50/80 px-4 py-1.5 text-xs font-medium text-indigo-700">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 0 0-2.455 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                </svg>
                Features
            </div>
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl lg:text-5xl">
                Everything your team needs to manage
                <span class="gradient-text">environment files.</span>
            </h2>
            <p class="mt-5 text-lg text-slate-600">
                A complete platform for secure, organized, and team-friendly environment management.
            </p>
        </div>

        <div class="mt-16 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            {{-- Feature 1 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-600 text-white shadow-lg shadow-indigo-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Encrypted Storage</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    All environment values are encrypted at rest. Your secrets never leave your infrastructure unencrypted.
                </p>
            </div>

            {{-- Feature 2 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-violet-500 to-violet-600 text-white shadow-lg shadow-violet-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Teams & Permissions</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Create teams and control which projects each can access. Granular view or edit permissions per team.
                </p>
            </div>

            {{-- Feature 3 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-amber-500 to-orange-500 text-white shadow-lg shadow-amber-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Multiple Environments</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Manage Local, Staging, Production, and any custom environments your workflow requires.
                </p>
            </div>

            {{-- Feature 5 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-rose-500 to-pink-500 text-white shadow-lg shadow-rose-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Production Protection</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Protect sensitive environments with restricted access and extra confirmation steps.
                </p>
            </div>

            {{-- Feature 7 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-slate-600 to-slate-700 text-white shadow-lg shadow-slate-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 4.5h14.25M3 9h9.75M3 13.5h5.25m5.25-.75L17.25 9m0 0L21 12.75M17.25 9v12" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Audit Logs</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Know who accessed or modified each environment with a complete audit trail of all activity.
                </p>
            </div>

            {{-- Feature 8 --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-teal-500 to-emerald-500 text-white shadow-lg shadow-teal-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 14.25h13.5m-13.5 0a3 3 0 0 1-3-3m3 3a3 3 0 1 0 0 6h13.5a3 3 0 1 0 0-6m-16.5-3a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3m-19.5 0a4.5 4.5 0 0 1 .9-2.7L5.737 5.1a3.375 3.375 0 0 1 2.7-1.35h7.126c1.062 0 2.062.5 2.7 1.35l2.587 3.45a4.5 4.5 0 0 1 .9 2.7m0 0a3 3 0 0 1-3 3m0 3h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Zm-3 6h.008v.008h-.008v-.008Zm0-6h.008v.008h-.008v-.008Z" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Self-Hostable</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Run EnvVault on your own infrastructure. Keep full control over your team's environment secrets.
                </p>
            </div>

            {{-- Feature 9: Import/Export --}}
            <div class="feature-card group rounded-2xl border border-slate-200/60 bg-white p-6 shadow-sm">
                <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-500 to-purple-500 text-white shadow-lg shadow-indigo-500/20">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                    </svg>
                </div>
                <h3 class="text-base font-semibold text-slate-900">Import & Export</h3>
                <p class="mt-2 text-sm leading-relaxed text-slate-600">
                    Import existing .env files instantly and export configurations when you need them.
                </p>
            </div>
        </div>
    </div>
</section>
