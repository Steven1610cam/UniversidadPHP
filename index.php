<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Controller\UniversidadController;

$controller = new UniversidadController();

$action = $_GET['action'] ?? 'list';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'delete':
        $controller->delete();
        break;

    case 'update':
        $controller->update();
        break;

    default:
        $controller->list();
        break;
}