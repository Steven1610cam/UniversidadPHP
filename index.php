<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUserRepository;
use App\Application\UseCase\LoginUserUseCase;
use App\Application\UseCase\RecoverPasswordUseCase;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$action = $_GET['action'] ?? 'login';

// LOGIN
if ($action === 'login') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $repo = new MySQLUserRepository($conn);
        $useCase = new LoginUserUseCase($repo);

        $login = $useCase->execute($_POST['email'], $_POST['password']);

        echo $login ? "Login exitoso" : "Credenciales incorrectas";

    } else {
        include __DIR__ . '/views/login.php';
    }
}

// RECUPERAR
elseif ($action === 'recover') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $repo = new MySQLUserRepository($conn);
        $useCase = new RecoverPasswordUseCase($repo);

        $ok = $useCase->execute($_POST['email'], $_POST['password']);

        echo $ok ? "Contraseña actualizada" : "Usuario no encontrado";

    } else {
        include __DIR__ . '/views/recover.php';
    }
}