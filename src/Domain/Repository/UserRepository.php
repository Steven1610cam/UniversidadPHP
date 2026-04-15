<?php

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface UserRepository
{
    //Buscar usuario por email
    public function findByEmail($email);

    //Actualizar contraseña
    public function updatePassword($email, $password);
}