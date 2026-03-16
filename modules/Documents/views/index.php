<?php
/**
 * View para listagem de documentos
 */
?>

<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h3 class="text-lg font-bold text-slate-800">Files & Assets</h3>
            <p class="text-sm text-slate-500">Access and organize files linked to your clients and projects.</p>
        </div>
        <div class="flex space-x-3">
            <a href="/admin/documents/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition-all flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path></svg>
                Upload Document
            </a>
        </div>
    </div>

    <!-- Tabela de Documentos -->
    <?php 
        $title = "Vault Repository";
        $headers = $tableHeaders;
        $rows = $tableRows;
        include __DIR__ . '/../../../app/Views/components/table.php'; 
    ?>
</div>
