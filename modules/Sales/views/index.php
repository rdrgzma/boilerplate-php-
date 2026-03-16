<?php
/**
 * View para listagem de vendas
 */
?>

<div class="flex justify-between items-center mb-6">
    <h3 class="text-xl font-bold text-slate-800">Recent Transactions</h3>
    <a href="/admin/sales/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100 flex items-center">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
        New Sale
    </a>
</div>

<?php 
$headers = ['ID', 'Client ID', 'Total Amount', 'Status', 'Quantity', 'Date', 'Actions'];
$rows = [];
foreach ($sales as $sale) {
    $rows[] = [
        $sale->id,
        $sale->client_id,
        '$' . number_format($sale->total_amount, 2),
        '<span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-emerald-100 text-emerald-700">Completed</span>',
        'N/A', // Quantity details usually in items
        date('d/m/Y', strtotime($sale->created_at)),
        '<div class="flex space-x-2">
            <a href="/admin/sales/show/'.$sale->id.'" class="p-1 px-3 text-[10px] font-bold text-indigo-600 bg-indigo-50 rounded-lg hover:bg-indigo-600 hover:text-white transition-all">VIEW INVOICE</a>
        </div>'
    ];
}

// Se não houver vendas reais, mostramos um placeholder bonito
if (empty($sales)) {
    echo '<div class="bg-white rounded-2xl p-12 text-center border-2 border-dashed border-slate-100">
            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4 text-slate-300">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            <h4 class="text-slate-900 font-bold">No sales recorded yet</h4>
            <p class="text-slate-500 text-sm mt-1 mb-6">Start your first transaction to see metrics and history here.</p>
            <a href="/admin/sales/create" class="inline-flex items-center text-indigo-600 font-bold text-sm hover:underline">Create a sale now &rarr;</a>
          </div>';
} else {
    include __DIR__ . '/../../../app/Views/components/table.php'; 
}
?>
