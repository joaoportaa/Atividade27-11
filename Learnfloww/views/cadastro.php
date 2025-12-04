<div class="max-w-md mx-auto bg-white p-8 rounded shadow-lg mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Cadastro</h2>

    <?php if(!empty($error)): ?>
        <script>alert("<?php echo $error; ?>");</script>
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" action="index.php?page=cadastro">
        <div class="mb-4">
            <label class="block mb-1">Nome de Usuário</label>
            <input type="text" name="username" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1">E-mail</label>
            <input type="email" name="email" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Senha</label>
            <input type="password" name="password" required class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Cadastrar</button>
    </form>
</div>