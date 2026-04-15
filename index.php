<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUniversidadRepository;
use App\Application\UseCase\GetAllUniversidadesUseCase;

// conexión
$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

// repo
$repo = new MySQLUniversidadRepository($conn);

// use case
$useCase = new GetAllUniversidadesUseCase($repo);

// ejecutar
$universidades = $useCase->execute();

// mostrar
echo "<h2>Lista de Universidades</h2>";

foreach ($universidades as $u) {
    echo $u['nombre'] . " - " . $u['ciudad'] . "<br>";
}