<h1 class="text-3xl font-bold text-blue-600 mb-4">Boilerplate Funcionando!</h1>
<p class="text-gray-600">A estrutura MVC com PSR-4 e Services está pronta para o Antigravity.</p>

<?php if (isset($mensagem)): ?>
    <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
        <?= $mensagem ?>
    </div>
<?php endif; ?>