<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Domain\Entity\Universidad;
use App\Infrastructure\Persistence\MySQLUniversidadRepository;
//solucion insert multiple
if (!isset($_GET['test'])) {
    echo "Usa ?test=1 en la URL";
    exit;
}


// conexión
$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

// repositorio
$repo = new MySQLUniversidadRepository($conn);

// entidad
$uni = new Universidad(
    "Universidad del Atlántico",
    "Pública",
    "https://www.uniatlantico.edu.co",
    "Rector Ejemplo",
    "info@uniatlantico.edu.co",
    "Abierto",
    "3001234567",
    "Barranquilla",
    30,
    5
);

// guardar
$result = $repo->save($uni);

if ($result) {
    echo "Universidad guardada";
} else {
    echo "Error al guardar";
}