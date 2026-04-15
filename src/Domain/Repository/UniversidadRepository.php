<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Universidad;

interface UniversidadRepository
{
    public function save(Universidad $universidad);
    public function findAll();
    public function findById($id);
    public function update($id, Universidad $universidad);
    public function delete($id);
}