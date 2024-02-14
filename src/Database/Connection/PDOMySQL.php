<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Connection;

class PDOMySQL extends PDOConnection
{
    public function getDsn(): string
    {
        return "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
    }
}
