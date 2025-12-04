<?php
// index.php - O ponto de entrada (Roteador) da aplicação LearnFlow

// 1. INICIAR SESSÃO
session_start();

// 2. INCLUIR ARQUIVOS DE CONFIGURAÇÃO E CLASSES (Models e Controllers)
// Configuração e Conexão com o Banco de Dados MySQL
require_once 'config/db.php'; 

// Modelos (Classes de manipulação de dados)
require_once 'model/User.php';
require_once 'model/Bloco.php';

// Controladores (Classes que contêm a lógica de cada página)
require_once 'controller/Home.php';
require_once 'controller/Auth.php';
require_once 'controller/Perfil.php';

// 3. ROTEAMENTO: Determinar qual página carregar
// Pega o valor do parâmetro 'page' na URL, ou assume 'home' por padrão
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// 4. CHAMAR O CONTROLLER E O MÉTODO CORRETO
switch ($page) {
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;
        
    case 'login':
        // Passa o objeto PDO ($pdo) para o Controller para que ele possa usar os Models
        $controller = new AuthController($pdo);
        $controller->login();
        break;
        
    case 'cadastro':
        $controller = new AuthController($pdo);
        $controller->register();
        break;
        
    case 'logout':
        $controller = new AuthController($pdo);
        $controller->logout();
        break;
        
    case 'perfil':
        // Acesso restrito. O construtor do ProfileController já verifica o login.
        $controller = new ProfileController($pdo);
        $controller->index();
        break;
        
    default:
        // Caso o usuário tente acessar uma página inexistente
        $controller = new HomeController();
        $controller->index();
        break;
}
?>