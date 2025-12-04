<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnFlow</title>
    <!-- Tailwind CSS (Estilo pronto) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-indigo-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">LearnFlow</h1>
            <div>
                <a href="index.php?page=home" class="mr-4 hover:underline">Home</a>
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="index.php?page=perfil" class="mr-4 hover:underline">Meu Perfil</a>
                    <a href="index.php?page=logout" class="bg-red-500 px-3 py-1 rounded hover:bg-red-700">Sair</a>
                <?php else: ?>
                    <a href="index.php?page=login" class="bg-white text-indigo-600 px-3 py-1 rounded font-bold hover:bg-gray-200">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <div class="container mx-auto flex-grow p-4">