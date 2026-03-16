<?php
/**
 * View para dashboards e relatórios
 */
?>

<div class="space-y-8">
    <!-- Grid de Métricas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div class="w-12 h-12 bg-indigo-50 rounded-xl flex items-center justify-center text-indigo-600 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div class="text-sm font-medium text-slate-500">Gross Revenue</div>
            <div class="text-2xl font-bold text-slate-900 mt-1">$<?= number_format($metrics['revenue'], 2) ?></div>
            <div class="text-xs text-emerald-600 font-bold mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7 7m-7-7v18"></path></svg>
                +14.2%
            </div>
        </div>
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <div class="text-sm font-medium text-slate-500">Service Orders</div>
            <div class="text-2xl font-bold text-slate-900 mt-1"><?= $metrics['orders'] ?></div>
            <div class="text-xs text-emerald-600 font-bold mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7-7m-7-7v18"></path></svg>
                +5.7%
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div class="text-sm font-medium text-slate-500">New Clients</div>
            <div class="text-2xl font-bold text-slate-900 mt-1"><?= $metrics['new_clients'] ?></div>
            <div class="text-xs text-rose-600 font-bold mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                -2.1%
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
            <div class="w-12 h-12 bg-rose-50 rounded-xl flex items-center justify-center text-rose-600 mb-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
            </div>
            <div class="text-sm font-medium text-slate-500">Sales Leads</div>
            <div class="text-2xl font-bold text-slate-900 mt-1"><?= $metrics['leads'] ?></div>
            <div class="text-xs text-emerald-600 font-bold mt-2 flex items-center">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 10l7-7m0 0l7-7m-7-7v18"></path></svg>
                +24%
            </div>
        </div>
    </div>

    <!-- Seção de Gráficos (Placeholder) -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 h-80 flex flex-col justify-center items-center">
            <div class="text-slate-400 mb-3 text-center">
                <svg class="w-12 h-12 mx-auto mb-2 opacity-20" fill="currentColor" viewBox="0 0 24 24"><path d="M5 19v-7h2v7H5zm5 0v-5h2v5h-2zm5 0v-9h2v9h-2zm5 0V5h2v14h-2z"/></svg>
                Monthly Revenue Analytics Chart
            </div>
            <div class="text-xs text-slate-500 font-mono">Chart implementation pending JS library integration</div>
        </div>
        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 h-80 flex flex-col justify-center items-center">
            <div class="text-slate-400 mb-3 text-center">
                <svg class="w-12 h-12 mx-auto mb-2 opacity-20" fill="currentColor" viewBox="0 0 24 24"><path d="M11 2v20c-5.07 0-9.25-3.8-9.91-8.67l-1.09-.33v-1l1.09-.33c.66-4.87 4.84-8.67 9.91-8.67zm11.91 10.67l-1.09.33c-.66 4.87-4.84 8.67-9.91 8.67V2c5.07 0 9.25 3.8 9.91 8.67l1.09.33v1z"/></svg>
                Distribution by Category Pie Chart
            </div>
            <div class="text-xs text-slate-500 font-mono">Chart implementation pending JS library integration</div>
        </div>
    </div>
</div>
