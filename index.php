<?php

require_once __DIR__ . '/vendor/autoload.php';

try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");
    echo "Conexión a la base de datos establecida.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}