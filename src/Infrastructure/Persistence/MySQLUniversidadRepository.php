<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\UniversidadRepository;
use App\Domain\Entity\Universidad;
use PDO;

class MySQLUniversidadRepository implements UniversidadRepository
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function save(Universidad $u)
    {
        $sql = "INSERT INTO universidad 
        (nombre, categoria, web, rector, email, acceso, telefono, ciudad, numeroCarreras, numSedes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $u->getNombre(),
            $u->getCategoria(),
            $u->getWeb(),
            $u->getRector(),
            $u->getEmail(),
            $u->getAcceso(),
            $u->getTelefono(),
            $u->getCiudad(),
            $u->getNumeroCarreras(),
            $u->getNumSedes()
        ]);
    }

    public function findAll()
    {
        return $this->conn->query("SELECT * FROM universidad")->fetchAll();
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM universidad WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, Universidad $u)
    {
        $sql = "UPDATE universidad SET 
        nombre=?, categoria=?, web=?, rector=?, email=?, acceso=?, telefono=?, ciudad=?, numeroCarreras=?, numSedes=?
        WHERE id=?";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            $u->getNombre(),
            $u->getCategoria(),
            $u->getWeb(),
            $u->getRector(),
            $u->getEmail(),
            $u->getAcceso(),
            $u->getTelefono(),
            $u->getCiudad(),
            $u->getNumeroCarreras(),
            $u->getNumSedes(),
            $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM universidad WHERE id=?");
        return $stmt->execute([$id]);
    }
}