<?php
/**
 * View para a listagem de clientes
 */
?>

<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Quick Actions</h3>
            <p class="text-sm text-slate-500">Add new clients or export your database.</p>
        </div>
        <div class="flex space-x-3">
            <a href="/admin/clients/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition-all flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                New Client
            </a>
            <button class="bg-slate-100 text-slate-700 px-4 py-2 rounded-xl font-semibold hover:bg-slate-200 transition-all">
                Export CSV
            </button>
        </div>
    </div>

    <!-- Tabela de Clientes -->
    <?php 
        $title = "Active Clients List";
        $headers = $tableHeaders;
        $rows = $tableRows;
        include __DIR__ . '/../../../app/Views/components/table.php'; 
    ?>
</div>
