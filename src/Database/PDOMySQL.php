<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database;

class PDOMySQL extends PDOConnection
{
    public function __construct($host, $dbname, $username, $password, $options = [])
    {
        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
        parent::__construct($dsn, $username, $password, $options);
    }
}
