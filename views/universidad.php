<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Controller\UniversidadController;

$controller = new UniversidadController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'create') {
        $controller->create();
    }
}

$universidades = (new App\Application\UseCase\GetAllUniversidadesUseCase(
    new App\Infrastructure\Persistence\MySQLUniversidadRepository(
        new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179")
    )
))->execute();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Universidades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <h1 class="text-center mb-4">Gestión de Universidades</h1>

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Crear Universidad
        </div>
        <div class="card-body">

            <form method="POST" class="row g-3">
                <input type="hidden" name="action" value="create">

                <div class="col-md-6">
                    <input class="form-control" name="acceso" placeholder="Acceso (Abierto/Cerrado)">
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="nombre" placeholder="Nombre" required>
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="categoria" placeholder="Categoría">
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="web" placeholder="Web">
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="rector" placeholder="Rector">
                </div>

                <div class="col-md-6">
                    <input class="form-control" type="email" name="email" placeholder="Email">
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="telefono" placeholder="Teléfono">
                </div>

                <div class="col-md-6">
                    <input class="form-control" name="ciudad" placeholder="Ciudad">
                </div>

                <div class="col-md-3">
                    <input class="form-control" type="number" name="numeroCarreras" placeholder="Carreras">
                </div>

                <div class="col-md-3">
                    <input class="form-control" type="number" name="numSedes" placeholder="Sedes">
                </div>

                <div class="col-md-12 text-end">
                    <button class="btn btn-success">Guardar</button>
                </div>
            </form>

        </div>
    </div>

    <div class="card">
        <div class="card-header bg-dark text-white">
            Lista de Universidades
        </div>
        <div class="card-body">

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Ciudad</th>
                        <th>Categoría</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($universidades as $u): ?>
                    <tr>
                        <td><?= $u['nombre'] ?></td>
                        <td><?= $u['ciudad'] ?></td>
                        <td><?= $u['categoria'] ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm"
                            href="?action=edit&id=<?= $u['id'] ?>">
                            Editar
                            </a>
                            
                            <a class="btn btn-danger btn-sm"
                                href="?action=delete&id=<?= $u['id'] ?>"
                                onclick="return confirm('¿Seguro que quieres eliminar?')">
                                Eliminar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

</div>

</body>
</html>