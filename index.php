<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Domain\Entity\Universidad;

$uni = new Universidad(
    "Uni Atlántico",
    "Pública",
    "www.uniatlantico.edu.co",
    "Rector X",
    "correo@uni.com",
    "Abierto",
    "3000000000",
    "Barranquilla",
    25,
    5
);

echo $uni->getNombre();