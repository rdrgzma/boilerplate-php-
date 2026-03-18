<?php
    $userName = $_SESSION['user_name'] ?? 'Usuário';
    $userRole = $_SESSION['user_role'] ?? 'Administrator';

    // Gera as iniciais a partir do nome (ex: "João Silva" → "JS")
    $nameParts = array_filter(explode(' ', $userName));
    $initials = strtoupper(
        (isset($nameParts[0]) ? $nameParts[0][0] : '') .
        (count($nameParts) > 1 ? end($nameParts)[0] : '')
    );
?>
<header class="sticky top-0 z-30 flex items-center justify-between h-16 px-4 sm:px-6 bg-white border-b border-slate-100 shadow-sm shadow-slate-100/80">

    <div class="flex items-center gap-2">
        <!-- Desktop Sidebar Toggle -->
        <button id="toggle-sidebar"
            class="hidden lg:inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all shrink-0"
            title="Toggle sidebar">
            <svg id="toggle-icon" class="w-5 h-5 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"/>
            </svg>
        </button>

        <!-- Mobile Sidebar Toggle -->
        <button id="open-sidebar"
            class="lg:hidden inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 transition-all"
            title="Open sidebar">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <!-- Breadcrumb / Page title -->
        <div class="flex items-center gap-2 ml-1">
            <span class="text-slate-300 hidden sm:block">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </span>
            <h2 class="text-sm font-semibold text-slate-700 truncate hidden sm:block tracking-tight">
                <?= htmlspecialchars($title ?? 'Dashboard') ?>
            </h2>
        </div>
    </div>

    <div class="flex items-center gap-1 sm:gap-2">
        <!-- Search -->
        <div class="hidden md:flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-xl px-3 py-2
                    focus-within:border-indigo-300 focus-within:ring-2 focus-within:ring-indigo-500/10
                    focus-within:bg-white transition-all w-52">
            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <input type="text" placeholder="Buscar..." id="topbar-search"
                class="bg-transparent border-none outline-none text-sm text-slate-700 placeholder:text-slate-400 w-full font-medium">
        </div>

        <!-- Notifications -->
        <button class="relative inline-flex items-center justify-center w-9 h-9 rounded-lg text-slate-400
                       hover:text-indigo-600 hover:bg-indigo-50 transition-all"
                title="Notificações">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-rose-500 rounded-full ring-2 ring-white animate-pulse"></span>
        </button>

        <!-- Divider -->
        <div class="w-px h-6 bg-slate-200 mx-1"></div>

        <!-- Profile -->
        <div class="flex items-center gap-3 pl-1">
            <div class="text-right hidden sm:block leading-tight">
                <p class="text-xs font-semibold text-slate-800"><?= htmlspecialchars($userName) ?></p>
                <p class="text-[10px] text-slate-400 capitalize"><?= htmlspecialchars($userRole) ?></p>
            </div>
            <button
                title="<?= htmlspecialchars($userName) ?>"
                class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-indigo-700
                       flex items-center justify-center text-white text-xs font-bold
                       ring-2 ring-white shadow-md shadow-indigo-200
                       hover:scale-105 hover:shadow-indigo-300 transition-all duration-200">
                <?= $initials ?: 'U' ?>
            </button>
        </div>
    </div>

</header>
