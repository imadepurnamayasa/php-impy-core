<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Connection;

use PDO;
use PDOException;

abstract class PDOConnection
{
    protected $pdo;
    protected string $host;
    protected int $port;
    protected string $username;
    protected string $password;
    protected string $dbname;    
    protected array $options;  

    public function __construct(
        string $host, 
        int $port, 
        string $username, 
        string $password, 
        string $dbname, 
        array $options = []
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->options = $options;
    }
    
    public function open(): bool
    {
        try {
            $this->pdo = new PDO($this->getDsn(), $this->username, $this->password, $this->options);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);            
        } catch (PDOException $e) {
            return false;
        } finally {
            return true;
        }
    }

    public function close()
    {        
        $this->pdo = null;
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    abstract function getDsn();
}