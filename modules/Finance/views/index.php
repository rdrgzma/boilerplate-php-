<?php
/**
 * View para listagem de transações financeiras
 */
?>

<div class="space-y-6">
    <!-- Resumo Rápido -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-emerald-500 p-6 rounded-2xl shadow-lg shadow-emerald-200 text-white">
            <h4 class="text-sm font-semibold opacity-80 uppercase tracking-wider">Total Revenue</h4>
            <div class="text-3xl font-bold mt-1">$42,500.00</div>
            <div class="text-xs mt-2 bg-white/20 inline-block px-2 py-1 rounded">+12% from last month</div>
        </div>
        <div class="bg-rose-500 p-6 rounded-2xl shadow-lg shadow-rose-200 text-white">
            <h4 class="text-sm font-semibold opacity-80 uppercase tracking-wider">Total Expenses</h4>
            <div class="text-3xl font-bold mt-1">$12,400.00</div>
            <div class="text-xs mt-2 bg-white/20 inline-block px-2 py-1 rounded">-5% from last month</div>
        </div>
        <div class="bg-indigo-600 p-6 rounded-2xl shadow-lg shadow-indigo-200 text-white">
            <h4 class="text-sm font-semibold opacity-80 uppercase tracking-wider">Net Profit</h4>
            <div class="text-3xl font-bold mt-1">$30,100.00</div>
            <div class="text-xs mt-2 bg-white/20 inline-block px-2 py-1 rounded">Healthy cash flow</div>
        </div>
    </div>

    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Financial History</h3>
            <p class="text-sm text-slate-500">Track every dollar entering and leaving your business.</p>
        </div>
        <div class="flex space-x-3">
            <a href="/admin/finance/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition-all flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New Transaction
            </a>
        </div>
    </div>

    <!-- Tabela de Transações -->
    <?php 
        $title = "Transaction Log";
        $headers = $tableHeaders;
        $rows = $tableRows;
        include __DIR__ . '/../../../app/Views/components/table.php'; 
    ?>
</div>
