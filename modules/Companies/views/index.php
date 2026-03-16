<?php
/**
 * View para a listagem de empresas
 */
?>

<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Tenant Management</h3>
            <p class="text-sm text-slate-500">Overview of all active companies on the platform.</p>
        </div>
        <a href="/admin/companies/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            New Company
        </a>
    </div>

    <!-- Tabela de Empresas -->
    <?php 
        $title = "Registered Organizations";
        $headers = $tableHeaders;
        $rows = $tableRows;
        include __DIR__ . '/../../../app/Views/components/table.php'; 
    ?>
</div>
