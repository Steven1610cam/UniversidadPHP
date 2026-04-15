<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Infrastructure\Controller\UniversidadController;

$controller = new UniversidadController();

// manejar acciones
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
</head>
<body>

<h1>CRUD Universidades</h1>

<h2>Crear Universidad</h2>

<form method="POST">
    <input type="hidden" name="action" value="create">

    <input type="text" name="nombre" placeholder="Nombre"><br>
    <input type="text" name="categoria" placeholder="Categoria"><br>
    <input type="text" name="web" placeholder="Web"><br>
    <input type="text" name="rector" placeholder="Rector"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="text" name="acceso" placeholder="Acceso"><br>
    <input type="text" name="telefono" placeholder="Telefono"><br>
    <input type="text" name="ciudad" placeholder="Ciudad"><br>
    <input type="number" name="numeroCarreras" placeholder="Numero Carreras"><br>
    <input type="number" name="numSedes" placeholder="Numero Sedes"><br>

    <button type="submit">Guardar</button>
</form>

<hr>

<h2>Lista de Universidades</h2>

<?php foreach ($universidades as $u): ?>
    <div>
        <strong><?= $u['nombre'] ?></strong> - <?= $u['ciudad'] ?>

        <a href="?action=delete&id=<?= $u['id'] ?>">Eliminar</a>
    </div>
<?php endforeach; ?>

</body>
</html>