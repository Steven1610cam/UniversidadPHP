<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Persistence\MySQLUniversidadRepository;

$conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");

$repo = new MySQLUniversidadRepository($conn);

$id = $_GET['id'];
$u = $repo->findById($id);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Universidad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <h2>Editar Universidad</h2>

    <form method="POST" action="index.php?action=update">

        <input type="hidden" name="id" value="<?= $u['id'] ?>">

        <input class="form-control mb-2" name="nombre" value="<?= $u['nombre'] ?>">
        <input class="form-control mb-2" name="categoria" value="<?= $u['categoria'] ?>">
        <input class="form-control mb-2" name="web" value="<?= $u['web'] ?>">
        <input class="form-control mb-2" name="rector" value="<?= $u['rector'] ?>">
        <input class="form-control mb-2" name="email" value="<?= $u['email'] ?>">
        <input class="form-control mb-2" name="acceso" value="<?= $u['acceso'] ?>">
        <input class="form-control mb-2" name="telefono" value="<?= $u['telefono'] ?>">
        <input class="form-control mb-2" name="ciudad" value="<?= $u['ciudad'] ?>">
        <input class="form-control mb-2" type="number" name="numeroCarreras" value="<?= $u['numeroCarreras'] ?>">
        <input class="form-control mb-2" type="number" name="numSedes" value="<?= $u['numSedes'] ?>">

        <button class="btn btn-success">Actualizar</button>
    </form>

</div>

</body>
</html>