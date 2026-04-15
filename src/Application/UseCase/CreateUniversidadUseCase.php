<?php

namespace App\Application\UseCase;

use App\Domain\Entity\Universidad;
use App\Domain\Repository\UniversidadRepository;

class CreateUniversidadUseCase
{
    private $repository;

    public function __construct(UniversidadRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(Universidad $universidad)
    {
        return $this->repository->save($universidad);
    }
}