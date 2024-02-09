<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database;

use PDO;

interface Connection
{
    public function open(string $dsn, string $username, string $password, array $options = []);
    public function close();
    public function connection(): PDO;
}
