<?php

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;

interface Connection
{
    public function open(string $host, int $port, string $username, string $password, string $database);
    public function close();
    public function connection(): PDO;
}
