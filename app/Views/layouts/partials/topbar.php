    <div class="flex items-center">
        <!-- Desktop Toggle -->
        <button id="toggle-sidebar" class="hidden lg:flex p-2 text-slate-500 hover:text-indigo-600 hover:bg-slate-100 rounded-xl transition-all mr-4 shrink-0">
            <svg id="toggle-icon" class="w-6 h-6 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path></svg>
        </button>

        <!-- Mobile Toggle -->
        <button id="open-sidebar" class="lg:hidden p-2 text-slate-500 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all mr-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        
        <h2 class="text-lg font-bold text-slate-800 truncate hidden sm:block">Dashboard Overview</h2>
    </div>

    <div class="flex items-center space-x-3 sm:space-x-4">
        <!-- Search -->
        <div class="hidden md:flex items-center bg-slate-100 rounded-xl px-4 py-2 focus-within:ring-2 focus-within:ring-indigo-500/20 focus-within:bg-white transition-all border border-transparent focus-within:border-indigo-100">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Quick search..." class="ml-2 bg-transparent border-none focus:outline-none text-sm w-48 text-slate-600 font-medium">
        </div>

        <!-- Notifications -->
        <button class="relative p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-full transition-all">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            <span class="absolute top-2 right-2 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
        </button>

        <!-- Profile -->
        <div class="flex items-center space-x-3 ml-2 border-l pl-4 border-slate-200">
            <div class="text-right hidden sm:block">
                <p class="text-xs font-semibold text-slate-800">John Doe</p>
                <p class="text-[10px] text-slate-500">Administrator</p>
            </div>
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-indigo-600 to-violet-600 flex items-center justify-center text-white font-bold ring-2 ring-white shadow-sm">
                JD
            </div>
        </div>
    </div>
</header>
