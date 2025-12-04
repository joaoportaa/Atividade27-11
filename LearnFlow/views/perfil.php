<div class="mb-6">
    <h2 class="text-3xl font-bold">Olá, <?php echo $_SESSION['user']['username']; ?>!</h2>
    <p class="text-gray-600">Gerencie seus estudos abaixo.</p>
</div>

<!-- Área de Criar Bloco -->
<div class="bg-indigo-50 p-4 rounded mb-8 border border-indigo-200">
    <h3 class="font-bold mb-2">Novo Bloco de Estudo</h3>
    <form method="POST" class="flex gap-2">
        <select name="subject" class="border p-2 rounded flex-grow">
            <option value="Português">Português</option>
            <option value="Matemática">Matemática</option>
            <option value="Inglês">Inglês</option>
        </select>
        <button type="submit" name="add_block" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-800">Criar</button>
    </form>
</div>

<!-- Listagem dos Blocos -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <?php foreach($blocks as $block): ?>
        <div class="bg-white p-4 rounded shadow border-t-4 border-indigo-500">
            <div class="flex justify-between items-center mb-2">
                <h4 class="font-bold text-xl"><?php echo htmlspecialchars($block['subject']); ?></h4>
                <form method="POST" onsubmit="return confirm('Excluir este bloco?');">
                    <input type="hidden" name="block_id" value="<?php echo $block['id']; ?>">
                    <button type="submit" name="delete_block" class="text-red-500 text-sm font-bold">X</button>
                </form>
            </div>
            
            <form method="POST">
                <input type="hidden" name="block_id" value="<?php echo $block['id']; ?>">
                <textarea name="notes" rows="5" class="w-full border bg-yellow-50 p-2 rounded text-sm mb-2" placeholder="Escreva aqui..."><?php echo htmlspecialchars($block['notes']); ?></textarea>
                <button type="submit" name="save_notes" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 py-1 rounded text-sm">Salvar Anotações</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

<?php if(empty($blocks)): ?>
    <p class="text-center text-gray-500">Nenhum bloco de estudo criado ainda.</p>
<?php endif; ?>