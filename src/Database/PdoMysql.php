<?php

namespace Imadepurnamayasa\PhpInti\Database;

use DotenvVault\DotenvVault;
use PDO;
use PDOException;

class PdoMysql implements IConnection
{

    protected $conn;

    public function open(string $host, int $port, string $username, string $password, string $dbname)
    {
        try {
            $this->conn = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            return json_encode([
                'messages' => $e->getMessage()
            ]);
        }        
    }

    public function openEnv(string $envdir)
    {
        $dotenv = DotenvVault::createImmutable($envdir);
        $dotenv->safeLoad();

        $host = $_SERVER['DATABASE_HOST'];
        $port = $_SERVER['DATABASE_PORT'];
        $username = $_SERVER['DATABASE_USERNAME'];
        $password = $_SERVER['DATABASE_PASSWORD'];
        $dbname = $_SERVER['DATABASE_DBNAME'];

        try {
            $this->conn = new PDO("mysql:host=$host:$port;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            return json_encode([
                'messages' => $e->getMessage()
            ]);
        }
    }

    public function close()
    {
        $this->conn = null;
    }

    public function connection(): PDO
    {
        return $this->conn;
    }
}
