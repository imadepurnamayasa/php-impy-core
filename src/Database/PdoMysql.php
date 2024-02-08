<?php

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;
use PDOException;

class PdoMysql implements Connection
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

    public function close()
    {
        $this->conn = null;
    }

    public function connection(): PDO
    {
        return $this->conn;
    }
}
