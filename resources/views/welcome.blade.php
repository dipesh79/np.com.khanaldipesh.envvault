<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">

    <title>EnvVault &mdash; Secure `.env` Management for Development Teams</title>
    <meta name="description" content="Securely store, manage, and share `.env` files across your development teams and projects with EnvVault.">

    <meta property="og:title" content="EnvVault — Secure `.env` Management for Development Teams">
    <meta property="og:description" content="Securely store, manage, and share `.env` files across your development teams and projects with EnvVault.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://envvault.khanaldipesh.com.np">

    <link rel="canonical" href="https://envvault.khanaldipesh.com.np">

    @fonts

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white text-slate-900 antialiased">
    <x-landing.navbar />

    <main>
        <x-landing.hero />
        <x-landing.problem />
        <x-landing.features />
        <x-landing.workflow />
        <x-landing.teams />
        <x-landing.security />
        <x-landing.developer-experience />
        <x-landing.self-hosting />
        <x-landing.open-source />
        <x-landing.cta />
    </main>

    <x-landing.footer />
</body>
</html>