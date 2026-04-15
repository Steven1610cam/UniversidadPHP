<?php

namespace App\Application\UseCase;

use App\Domain\Entity\Universidad;
use App\Domain\Repository\UniversidadRepository;

class UpdateUniversidadUseCase
{
    private $repository;

    public function __construct(UniversidadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id, Universidad $universidad)
    {
        return $this->repository->update($id, $universidad);
    }
}