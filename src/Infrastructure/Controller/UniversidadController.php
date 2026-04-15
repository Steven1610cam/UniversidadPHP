<?php

namespace App\Infrastructure\Controller;

use App\Domain\Entity\Universidad;
use App\Infrastructure\Persistence\MySQLUniversidadRepository;
use App\Application\UseCase\CreateUniversidadUseCase;
use App\Application\UseCase\GetAllUniversidadesUseCase;
use App\Application\UseCase\DeleteUniversidadUseCase;
use App\Application\UseCase\UpdateUniversidadUseCase;
use PDO;

class UniversidadController
{
    private $repo;

    public function __construct()
    {
        $conn = new PDO("mysql:host=127.0.0.1;dbname=universidad_db", "root", "6860179");
        $this->repo = new MySQLUniversidadRepository($conn);
    }

    public function create()
    {
        $uni = new Universidad(
            $_POST['nombre'],
            $_POST['categoria'],
            $_POST['web'],
            $_POST['rector'],
            $_POST['email'],
            $_POST['acceso'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['numeroCarreras'],
            $_POST['numSedes']
        );

        $useCase = new CreateUniversidadUseCase($this->repo);
        $useCase->execute($uni);

        echo "Universidad creada";
    }

    public function list()
    {
        $useCase = new GetAllUniversidadesUseCase($this->repo);
        $data = $useCase->execute();

        foreach ($data as $u) {
            echo $u['nombre'] . " - " . $u['ciudad'] . "<br>";
        }
    }

    public function delete()
    {
        $id = $_GET['id'];

        $useCase = new DeleteUniversidadUseCase($this->repo);
        $useCase->execute($id);

        $_SESSION['success'] = "Universidad eliminada con éxito";

        header("Location: index.php?action=dashboard");
        exit;
    }

    public function update()
    {
        $id = $_POST['id'];

        $uni = new Universidad(
            $_POST['nombre'],
            $_POST['categoria'],
            $_POST['web'],
            $_POST['rector'],
            $_POST['email'],
            $_POST['acceso'],
            $_POST['telefono'],
            $_POST['ciudad'],
            $_POST['numeroCarreras'],
            $_POST['numSedes']
        );

        $useCase = new UpdateUniversidadUseCase($this->repo);
        $useCase->execute($id, $uni);

        $_SESSION['success'] = "Universidad actualizada con éxito";

        header("Location: index.php?action=dashboard");
        exit;
    }
}