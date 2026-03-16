<?php
/**
 * View para detalhes da venda (Fatura/Invoice)
 */
?>

<div class="max-w-4xl mx-auto space-y-8">
    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 overflow-hidden">
        <!-- Header -->
        <div class="p-8 sm:p-12 border-b border-slate-50 flex flex-col md:flex-row justify-between items-start md:items-center bg-slate-50/30">
            <div>
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center text-white mb-4 shadow-lg shadow-indigo-500/30">
                    <span class="font-bold text-xl">A</span>
                </div>
                <h3 class="text-2xl font-black text-slate-900 tracking-tight">INVOICE <span class="text-indigo-600">#<?= str_pad($sale->id, 5, '0', STR_PAD_LEFT) ?></span></h3>
                <p class="text-slate-500 text-sm mt-1 uppercase tracking-widest font-bold">Issued on <?= date('d M, Y', strtotime($sale->created_at)) ?></p>
            </div>
            <div class="mt-6 md:mt-0 text-right">
                <span class="px-4 py-1.5 rounded-full text-xs font-black uppercase tracking-widest bg-emerald-100 text-emerald-700">STATUS: COMPLETED</span>
            </div>
        </div>

        <!-- Info Grid -->
        <div class="p-8 sm:p-12 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div>
                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Billed To</h4>
                <div class="space-y-1">
                    <p class="text-lg font-bold text-slate-900"><?= $client->name ?></p>
                    <p class="text-slate-500 font-medium"><?= $client->company_name ?></p>
                    <p class="text-slate-500 font-medium"><?= $client->email ?></p>
                    <p class="text-slate-500 font-medium"><?= $client->phone ?></p>
                </div>
            </div>
            <div>
                <h4 class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Order Summary</h4>
                <div class="space-y-3">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 font-medium">Subtotal</span>
                        <span class="text-slate-900 font-bold">$<?= number_format($sale->total_amount, 2) ?></span>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500 font-medium">Discount</span>
                        <span class="text-indigo-600 font-bold">-$0.00</span>
                    </div>
                    <div class="flex justify-between items-center pt-3 border-t border-slate-100">
                        <span class="text-slate-900 font-black uppercase tracking-wider">Total</span>
                        <span class="text-3xl font-black text-indigo-600">$<?= number_format($sale->total_amount, 2) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Placeholder -->
        <div class="px-8 sm:px-12 pb-12">
            <div class="overflow-x-auto rounded-2xl border border-slate-100">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 font-black text-slate-500 uppercase tracking-widest text-[10px]">Description</th>
                            <th class="px-6 py-4 font-black text-slate-500 uppercase tracking-widest text-[10px]">Price</th>
                            <th class="px-6 py-4 font-black text-slate-500 uppercase tracking-widest text-[10px] text-center">Qty</th>
                            <th class="px-6 py-4 font-black text-slate-500 uppercase tracking-widest text-[10px] text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        <!-- Simulated items for this view -->
                        <tr>
                            <td class="px-6 py-5 font-bold text-slate-900 text-base">Standard Business Product</td>
                            <td class="px-6 py-5 text-slate-600">$<?= number_format($sale->total_amount, 2) ?></td>
                            <td class="px-6 py-5 text-slate-600 text-center">1</td>
                            <td class="px-6 py-5 text-slate-900 font-bold text-right">$<?= number_format($sale->total_amount, 2) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
        <button class="px-8 py-3 bg-white border border-slate-200 rounded-2xl font-bold text-slate-700 hover:bg-slate-50 transition-all flex items-center justify-center">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
            Print Invoice
        </button>
        <a href="/admin/sales" class="px-8 py-3 bg-slate-900 rounded-2xl font-bold text-white hover:bg-slate-800 transition-all flex items-center justify-center">
            Back to Sales
        </a>
    </div>
</div>
