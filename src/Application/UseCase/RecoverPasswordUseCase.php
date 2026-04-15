<?php

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepository;

class RecoverPasswordUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email, $newPassword)
    {
        $user = $this->repository->findByEmail($email);

        if (!$user) {
            return false;
        }

        return $this->repository->updatePassword($email, $newPassword);
    }
}