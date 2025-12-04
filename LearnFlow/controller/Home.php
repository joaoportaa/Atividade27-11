<?php
class HomeController {
    public function index() {
        // Carrega a view da home
        require 'views/header.php';
        require 'views/home.php';
        require 'views/footer.php';
    }
}
?>