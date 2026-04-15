<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUniversidadRepository;
use App\Application\UseCase\DeleteUniversidadUseCase;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$repo = new MySQLUniversidadRepository($conn);

$useCase = new DeleteUniversidadUseCase($repo);

//ID a eliminar
$id = 1;

$result = $useCase->execute($id);

echo $result ? "Eliminado" : "Error";