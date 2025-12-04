<?php
// config/db.php - Conexão com o banco de dados MySQL

// -----------------------------------------------------------------------------
// AJUSTE ESTAS CONFIGURAÇÕES DE ACORDO COM SEU AMBIENTE MYSQL
// -----------------------------------------------------------------------------
$host = 'localhost';
$dbname = 'learnflow';
$username = 'root';     // Mantenha "root" ou seu usuário do MySQL
$password = '';         // Mantenha vazio '' ou sua senha do MySQL (se houver)
// -----------------------------------------------------------------------------

try {
    // String de conexão DSN (Driver Source Name)
    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
    
    // Conexão via PDO (PHP Data Objects)
    $pdo = new PDO($dsn, $username, $password);
    
    // Configura o PDO para lançar exceções em caso de erro, facilitando a depuração
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Se der erro ao conectar (ex: MySQL não está ativo), o script para.
    die("Erro ao conectar com o banco de dados: " . $e->getMessage() . 
        "<br>Verifique se o servidor MySQL está ativo e se os dados de conexão em 'config/db.php' estão corretos.");
}
?>