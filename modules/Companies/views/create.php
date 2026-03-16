<?php
/**
 * View para criação de nova empresa
 */
?>

<div class="max-w-4xl mx-auto">
    <div class="flex items-center space-x-4 mb-8">
        <a href="/admin/companies" class="p-2 bg-white rounded-xl shadow-sm border border-slate-100 text-slate-500 hover:text-indigo-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Provision New Tenant</h1>
            <p class="text-slate-500">Create a new company account and setup their domain.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="/admin/companies/store" method="POST" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Company Name</label>
                    <input type="text" name="name" required placeholder="Nexus Corp" class="w-full px-4 py-2.5 rounded-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Domain / Subdomain</label>
                    <div class="flex">
                        <input type="text" name="domain" required placeholder="nexus" class="flex-1 px-4 py-2.5 rounded-l-xl border border-slate-200 focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-500 transition-all outline-none bg-slate-50/50">
                        <span class="inline-flex items-center px-4 rounded-r-xl border border-l-0 border-slate-200 bg-slate-100 text-slate-500 text-sm">.yourplatform.com</span>
                    </div>
                </div>
            </div>

            <div class="pt-4 border-t border-slate-100 flex justify-end space-x-3">
                <a href="/admin/companies" class="px-6 py-2.5 rounded-xl text-slate-600 font-semibold hover:bg-slate-50 transition-all">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-8 py-2.5 rounded-xl font-bold hover:bg-indigo-700 shadow-lg shadow-indigo-200 transition-all">
                    Create Tenant
                </button>
            </div>
        </form>
    </div>
</div>
