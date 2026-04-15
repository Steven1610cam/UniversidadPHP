<?php

namespace App\Application\UseCase;

use App\Domain\Repository\UniversidadRepository;

class DeleteUniversidadUseCase
{
    private $repository;

    public function __construct(UniversidadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($id)
    {
        return $this->repository->delete($id);
    }
}