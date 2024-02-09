<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;
use PDOException;

abstract class PDOConnection
{
    protected $pdo;

    public function __construct(string $dsn, string $username, string $password, array $options = [])
    {
        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            return json_encode([
                'messages' => $e->getMessage()
            ]);
        }
    }

    public function close()
    {
        $this->pdo = null;
    }

    public function connection(): PDO
    {
        return $this->pdo;
    }
}
