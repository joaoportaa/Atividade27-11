<?php
// models/User.php - Gerencia operações de usuários

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($username, $email, $password) {
        // Verifica se o e-mail já existe
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            return false; // E-mail já existe
        }

        // Insere novo usuário no banco de dados
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        // NOTA: Em um projeto real, a senha deveria ser hasheada (ex: password_hash())
        return $stmt->execute([$username, $email, $password]);
    }

    public function login($email, $password) {
        // Busca o usuário pelo e-mail
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verifica se o usuário existe e se a senha corresponde
        if ($user && $user['password'] == $password) {
            return $user;
        }
        return false;
    }
}
?>