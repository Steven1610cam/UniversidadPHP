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
}