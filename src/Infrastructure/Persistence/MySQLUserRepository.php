<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Repository\UserRepository;
use PDO;

class MySQLUserRepository implements UserRepository
{
    private $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function findByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function updatePassword($email, $password)
    {
        $stmt = $this->conn->prepare("UPDATE users SET password=? WHERE email=?");
        return $stmt->execute([$password, $email]);
    }       
}