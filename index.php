<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Domain\Entity\Universidad;
use App\Infrastructure\Persistence\MySQLUniversidadRepository;
use App\Application\UseCase\UpdateUniversidadUseCase;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$repo = new MySQLUniversidadRepository($conn);

$useCase = new UpdateUniversidadUseCase($repo);

// ID existente
$id = 1;

$uni = new Universidad(
    "Universidad Actualizada",
    "Privada",
    "https://actualizada.edu.co",
    "Nuevo Rector",
    "nuevo@correo.com",
    "Cerrado",
    "3111111111",
    "Barranquilla",
    40,
    10
);

$result = $useCase->execute($id, $uni);

echo $result ? "Actualizado" : "Error";