<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? $_ENV['APP_NAME'] ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased p-8">
    
    <main class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-sm">
        <?php require $contentView; ?>
    </main>

</body>
</html>
