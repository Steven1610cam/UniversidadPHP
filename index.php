<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUserRepository;
use App\Application\UseCase\LoginUserUseCase;
use App\Application\UseCase\RecoverPasswordUseCase;
use App\Infrastructure\Controller\UniversidadController;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$action = $_GET['action'] ?? 'login';

// LOGIN
if ($action === 'login') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $repo = new MySQLUserRepository($conn);
        $useCase = new LoginUserUseCase($repo);

        $login = $useCase->execute($_POST['email'], $_POST['password']);

        if ($login) {
            $_SESSION['user'] = $_POST['email'];

            header("Location: index.php?action=dashboard");
            exit;
        } else {
            echo "Credenciales incorrectas";
        }

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

// DASHBOARD (CRUD)
elseif ($action === 'dashboard') {

    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }

    include __DIR__ . '/views/universidad.php';
}

// EDIT
elseif ($action === 'edit') {

    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }

    include __DIR__ . '/views/edit.php';
}

elseif ($action === 'update') {

    $controller = new UniversidadController();
    $controller->update();
}

// DELETE
elseif ($action === 'delete') {

    if (!isset($_SESSION['user'])) {
        header("Location: index.php?action=login");
        exit;
    }

    $controller = new UniversidadController();
    $controller->delete();
}