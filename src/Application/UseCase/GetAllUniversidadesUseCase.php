<?php

namespace App\Application\UseCase;

use App\Domain\Repository\UniversidadRepository;

class GetAllUniversidadesUseCase
{
    private $repository;

    public function __construct(UniversidadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute()
    {
        return $this->repository->findAll();
    }
}