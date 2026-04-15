<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Domain\Entity\Universidad;
use App\Infrastructure\Persistence\MySQLUniversidadRepository;
use App\Application\UseCase\CreateUniversidadUseCase;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$repo = new MySQLUniversidadRepository($conn);

// Use Case
$useCase = new CreateUniversidadUseCase($repo);

$uni = new Universidad(
    "Uni Caribe",
    "Privada",
    "https://caribe.edu.co",
    "Rector Caribe",
    "info@caribe.edu.co",
    "Abierto",
    "3011111111",
    "Barranquilla",
    15,
    3
);

// ejecutar caso de uso
$result = $useCase->execute($uni);

echo $result ? "Guardado con UseCase" : "Error";