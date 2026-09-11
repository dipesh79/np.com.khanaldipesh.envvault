<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invitation — {{ config('app.name') }}</title>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css'])
    @endif
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center antialiased">
    <div class="w-full max-w-md mx-auto px-4">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

            @if (session('error'))
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($status === 'expired')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-2">Invitation Expired</h1>
                    <p class="text-gray-500 mb-6">This invitation has expired. Please contact the organization administrator for a new invitation.</p>
                    <a href="{{ url('/') }}" class="inline-block text-sm text-amber-600 hover:text-amber-700 font-medium">Go to homepage</a>
                </div>

            @elseif ($status === 'already_accepted')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-2">Already Accepted</h1>
                    <p class="text-gray-500 mb-2">This invitation has already been accepted.</p>
                    <p class="text-gray-500 mb-6">You are already a member of <span class="font-medium text-gray-700">{{ $invitation->organization->name }}</span>.</p>
                    @auth
                        <a href="{{ url('/app') }}" class="inline-block px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                            Go to Dashboard
                        </a>
                    @else
                        <a href="{{ url('/app/login') }}" class="inline-block px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                            Log In
                        </a>
                    @endauth
                </div>

            @elseif ($status === 'already_member')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-2">Already a Member</h1>
                    <p class="text-gray-500 mb-6">You are already a member of <span class="font-medium text-gray-700">{{ $invitation->organization->name }}</span>.</p>
                    <a href="{{ url('/app') }}" class="inline-block px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                        Go to Dashboard
                    </a>
                </div>

            @elseif ($status === 'email_mismatch')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-2">Wrong Account</h1>
                    <p class="text-gray-500 mb-2">This invitation was sent to <span class="font-medium text-gray-700">{{ $invitation->invitee?->email ?? $invitation->email }}</span>.</p>
                    <p class="text-gray-500 mb-6">Please log in using that email address, or ask the organization owner to invite your current email.</p>
                    <a href="{{ url('/app/login') }}" class="inline-block px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                        Log In with Correct Email
                    </a>
                </div>

            @elseif ($status === 'guest')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-1">You've been invited!</h1>
                    <p class="text-gray-500 mb-6">Join <span class="font-medium text-gray-700">{{ $invitation->organization->name }}</span></p>

                    <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Organization</span>
                            <span class="font-medium text-gray-900">{{ $invitation->organization->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Invited email</span>
                            <span class="font-medium text-gray-900">{{ $invitation->invitee?->email ?? $invitation->email }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Role</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                {{ ucfirst($invitation->role->value) }}
                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Expires</span>
                            <span class="font-medium text-gray-900">{{ $invitation->expires_at->format('F j, Y') }}</span>
                        </div>
                    </div>

                    <p class="text-gray-500 text-sm mb-6">Please log in or create an account to accept this invitation.</p>

                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ url('/app/login') }}" class="flex-1 inline-block px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                            Log In
                        </a>
                        <a href="{{ url('/app/register') }}" class="flex-1 inline-block px-5 py-2.5 bg-white hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-lg border border-gray-300 transition-colors">
                            Register
                        </a>
                    </div>
                </div>

            @elseif ($status === 'ready')
                <div class="text-center">
                    <div class="mx-auto w-12 h-12 bg-amber-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                        </svg>
                    </div>
                    <h1 class="text-xl font-semibold text-gray-900 mb-1">You've been invited!</h1>
                    <p class="text-gray-500 mb-6">Join <span class="font-medium text-gray-700">{{ $invitation->organization->name }}</span></p>

                    <div class="bg-gray-50 rounded-lg p-4 mb-6 text-left space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Organization</span>
                            <span class="font-medium text-gray-900">{{ $invitation->organization->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Invited email</span>
                            <span class="font-medium text-gray-900">{{ $invitation->invitee?->email ?? $invitation->email }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Role</span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                {{ ucfirst($invitation->role->value) }}
                            </span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Expires</span>
                            <span class="font-medium text-gray-900">{{ $invitation->expires_at->format('F j, Y') }}</span>
                        </div>
                    </div>

                    <form method="POST" action="{{ route('invitations.accept', $invitation->token) }}">
                        @csrf
                        <button type="submit" class="w-full px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white text-sm font-medium rounded-lg transition-colors">
                            Accept Invitation
                        </button>
                    </form>
                </div>
            @endif

        </div>

        <p class="text-center text-xs text-gray-400 mt-6">
            <a href="{{ url('/') }}" class="hover:text-gray-600 transition-colors">{{ config('app.name') }}</a>
        </p>
    </div>
</body>
</html>
