<?php

namespace App\Application\UseCase;

use App\Domain\Repository\UserRepository;

class LoginUserUseCase
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute($email, $password)
    {
        $user = $this->repository->findByEmail($email);

        if (!$user) {
            return false;
        }

        return $user['password'] === $password;
    }
}