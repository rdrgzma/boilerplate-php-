<div class="max-w-md mx-auto mt-10 bg-white p-8 border border-gray-200 rounded-lg shadow-sm">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Acessar o Sistema</h2>

    <?php if (isset($error)): ?>
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded-md text-sm">
            <?= $error ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="/login" class="space-y-4">
        <div>
            <label class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" name="email" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" name="password" required class="mt-1 w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 transition">
            Entrar
        </button>
    </form>
</div>