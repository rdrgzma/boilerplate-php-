<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? $_ENV['APP_NAME'] ?> - Admin</title>
    <!-- Tailwind CSS v4 -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 antialiased overflow-x-hidden">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php include __DIR__ . '/partials/sidebar.php'; ?>

        <div id="main-content" class="flex-1 flex flex-col lg:ml-64 transition-all duration-300 ease-in-out">
            <!-- Topbar -->
            <?php include __DIR__ . '/partials/topbar.php'; ?>

            <!-- Page Content -->
            <main class="p-4 sm:p-6 md:p-8">
                <!-- Overlay for mobile sidebar -->
                <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm z-40 hidden transition-opacity duration-300 opacity-0 lg:hidden"></div>
                
                <div class="max-w-7xl mx-auto">
                    <?php if (isset($header)): ?>
                        <div class="mb-8 animate-in fade-in slide-in-from-bottom-4 duration-500">
                            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight transition-all"><?= $header ?></h1>
                            <?php if (isset($subtitle)): ?>
                                <p class="text-slate-500 mt-2 text-base sm:text-lg max-w-2xl leading-relaxed"><?= $subtitle ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="animate-in fade-in duration-700 delay-150">
                        <?php require $contentView; ?>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-auto py-8 px-8 border-t border-slate-200 bg-white/50 backdrop-blur-sm">
                <div class="flex flex-col md:flex-row justify-between items-center max-w-7xl mx-auto space-y-4 md:space-y-0">
                    <p class="text-slate-500 text-sm font-medium">
                        &copy; <?= date('Y') ?> <span class="text-indigo-600 font-bold">AdminPro</span>. All rights reserved.
                    </p>
                    <div class="flex space-x-6 text-sm text-slate-400">
                        <a href="#" class="hover:text-indigo-600 transition-colors">Privacy Policy</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">Terms of Service</a>
                        <a href="#" class="hover:text-indigo-600 transition-colors">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Interactive Sidebar Controller -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        const overlay = document.getElementById('sidebar-overlay');
        const openBtn = document.getElementById('open-sidebar');
        const closeBtn = document.getElementById('close-sidebar');
        const toggleBtn = document.getElementById('toggle-sidebar');
        const toggleIcon = document.getElementById('toggle-icon');
        
        // --- State Management ---
        let isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

        function initSidebar() {
            if (isCollapsed && window.innerWidth >= 1024) {
                applyCollapse(true);
            }
        }

        function applyCollapse(collapsed) {
            if (collapsed) {
                sidebar.classList.replace('w-64', 'w-20');
                mainContent.classList.replace('lg:ml-64', 'lg:ml-20');
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.add('lg:hidden', 'opacity-0'));
                if(toggleIcon) toggleIcon.classList.add('rotate-180');
            } else {
                sidebar.classList.replace('w-20', 'w-64');
                mainContent.classList.replace('lg:ml-20', 'lg:ml-64');
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('lg:hidden', 'opacity-0'));
                if(toggleIcon) toggleIcon.classList.remove('rotate-180');
            }
        }

        function toggleDesktopCollapse() {
            isCollapsed = !isCollapsed;
            localStorage.setItem('sidebarCollapsed', isCollapsed);
            applyCollapse(isCollapsed);
        }

        function toggleMobileSidebar() {
            const isOpen = !sidebar.classList.contains('-translate-x-full');
            if (isOpen) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                overlay.classList.replace('opacity-100', 'opacity-0');
                document.body.classList.remove('overflow-hidden');
            } else {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.replace('opacity-0', 'opacity-100'), 10);
                document.body.classList.add('overflow-hidden');
            }
        }

        // --- Event Listeners ---
        if(toggleBtn) toggleBtn.addEventListener('click', toggleDesktopCollapse);
        if(openBtn) openBtn.addEventListener('click', toggleMobileSidebar);
        if(closeBtn) closeBtn.addEventListener('click', toggleMobileSidebar);
        if(overlay) overlay.addEventListener('click', toggleMobileSidebar);

        // Initial setup
        initSidebar();

        // Responsive handling
        window.addEventListener('resize', () => {
            if (window.innerWidth < 1024) {
                // Reset to full width for mobile view consistency
                sidebar.classList.replace('w-20', 'w-64');
                document.querySelectorAll('.sidebar-text').forEach(el => el.classList.remove('lg:hidden', 'opacity-0'));
            } else {
                if (isCollapsed) applyCollapse(true);
            }
        });
    </script>

    <style>
        .custom-scrollbar::-webkit-scrollbar { width: 4px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: rgba(255, 255, 255, 0.1); border-radius: 20px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: rgba(255, 255, 255, 0.2); }
        
        @keyframes fade-in { from { opacity: 0; } to { opacity: 1; } }
        @keyframes slide-in-from-bottom { from { transform: translateY(1rem); } to { transform: translateY(0); } }
        .animate-in { animation: fade-in 0.5s ease-out forwards; }
        .fade-in { opacity: 0; }
        .slide-in-from-bottom-4 { animation: slide-in-from-bottom 0.5s ease-out forwards, fade-in 0.5s ease-out forwards; }
    </style>
</body>
</html>
