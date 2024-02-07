<?php

namespace Imadepurnamayasa\PhpInti\Database;

use DotenvVault\DotenvVault;
use PDO;
use PDOException;

class PdoMysql implements IKoneksi
{

    protected $conn;

    public function buka($host, $port, $username, $password, $dbname)
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

    public function bukaEnv($envdir)
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

    public function tutup()
    {
    }

    public function koneksi(): PDO
    {
        return $this->conn;
    }
}
