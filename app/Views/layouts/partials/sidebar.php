<aside id="sidebar" class="fixed inset-y-0 left-0 z-50 w-64 bg-slate-900 border-r border-slate-800 text-slate-300 transition-all duration-300 transform lg:translate-x-0 -translate-x-full overflow-hidden group flex flex-col">
    <div class="flex items-center justify-between h-16 px-6 bg-slate-950/50 backdrop-blur-xl border-b border-white/5 shrink-0">
        <div class="flex items-center overflow-hidden">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center text-white mr-3 shrink-0 shadow-lg shadow-indigo-500/20">
                <span class="font-bold text-lg">A</span>
            </div>
            <span class="text-xl font-bold text-white tracking-wider sidebar-text whitespace-nowrap transition-opacity duration-300">ADMIN<span class="text-indigo-400">PRO</span></span>
        </div>
        <button id="close-sidebar" class="lg:hidden text-slate-400 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
    </div>

    <nav class="flex-1 mt-6 px-3 space-y-1.5 overflow-y-auto overflow-x-hidden custom-scrollbar">
        <!-- Dashboard Section -->
        <a href="/admin/dashboard" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Dashboard">
            <svg class="w-5 h-5 mr-3 text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Dashboard</span>
        </a>

        <!-- CRM & SALES -->
        <div class="pt-4 pb-1 sidebar-text transition-opacity duration-300">
            <span class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest block">CRM & Sales</span>
        </div>
        <a href="/admin/sales" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Sales">
            <svg class="w-5 h-5 mr-3 text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Sales</span>
        </a>
        <a href="/admin/clients" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Clients">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Clients</span>
        </a>
        <a href="/admin/appointments" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Appointments">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Appointments</span>
        </a>

        <!-- OPERATIONS -->
        <div class="pt-4 pb-1 sidebar-text transition-opacity duration-300">
            <span class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest block">Operations</span>
        </div>
        <a href="/admin/products" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Products">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Products</span>
        </a>
        <a href="/admin/service-orders" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Service Orders">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Service Orders</span>
        </a>
        <a href="/admin/documents" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Documents">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Documents</span>
        </a>

        <!-- ADMINISTRATION -->
        <div class="pt-4 pb-1 sidebar-text transition-opacity duration-300">
            <span class="px-4 text-[10px] font-bold text-slate-500 uppercase tracking-widest block">Administration</span>
        </div>
        <a href="/admin/finance" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Finance">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Finance</span>
        </a>
        <a href="/admin/users" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Team">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Team</span>
        </a>
        <a href="/admin/companies" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Companies">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Companies</span>
        </a>
        <a href="/admin/reports" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Reports">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Reports</span>
        </a>
        <a href="/admin/settings" class="flex items-center px-4 py-3 text-sm font-medium rounded-xl hover:bg-slate-800 hover:text-white transition-all group/item" title="Settings">
            <svg class="w-5 h-5 mr-3 text-slate-400 group-hover/item:text-indigo-400 shrink-0 transition-transform duration-300 group-hover/item:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Settings</span>
        </a>
    </nav>

    <div class="p-4 border-t border-white/5 bg-slate-900/50 backdrop-blur-md mt-auto shrink-0">
        <a href="/logout" class="flex items-center px-4 py-3 text-sm font-medium text-slate-400 hover:text-white hover:bg-rose-500/10 rounded-xl transition-all group/logout" title="Logout">
            <svg class="w-5 h-5 mr-3 group-hover/logout:text-rose-500 shrink-0 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
            <span class="sidebar-text truncate transition-opacity duration-300">Logout</span>
        </a>
    </div>
</aside>
