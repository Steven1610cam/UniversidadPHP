<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUserRepository;
use App\Application\UseCase\LoginUserUseCase;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $repo = new MySQLUserRepository($conn);
    $useCase = new LoginUserUseCase($repo);

    $login = $useCase->execute($_POST['email'], $_POST['password']);

    if ($login) {
        echo "Login exitoso";
    } else {
        echo "Credenciales incorrectas";
    }

} else {
    include __DIR__ . '/views/login.php';
}