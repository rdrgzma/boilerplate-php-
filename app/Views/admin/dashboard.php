<div class="flex justify-between items-center mb-6 border-b pb-4">
    <h1 class="text-3xl font-bold text-gray-800">Painel Administrativo</h1>
    <a href="/logout" class="text-sm bg-red-50 text-red-600 px-3 py-1 rounded-md hover:bg-red-100 transition">
        Sair (Logout)
    </a>
</div>

<div class="bg-blue-50 border border-blue-100 p-6 rounded-lg">
    <h2 class="text-xl font-semibold text-blue-800">Olá, <?= htmlspecialchars($userName) ?>!</h2>
    <p class="text-blue-600 mt-2">Bem-vindo à área restrita do sistema. Esta página está protegida pela sessão do PHP.</p>
</div>