<?php
/**
 * View para a listagem de usuários
 */
?>

<div class="space-y-6">
    <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
        <div>
            <h3 class="text-lg font-bold text-slate-800">User Management</h3>
            <p class="text-sm text-slate-500">Add team members and set their permissions.</p>
        </div>
        <a href="/admin/users/create" class="bg-indigo-600 text-white px-4 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition-all flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            Invite User
        </a>
    </div>

    <!-- Tabela de Usuários -->
    <?php 
        $title = "Team Members";
        $headers = $tableHeaders;
        $rows = $tableRows;
        include __DIR__ . '/../../../app/Views/components/table.php'; 
    ?>
</div>
