<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Query;

use Imadepurnamayasa\PhpInti\Database\Connection\ConnectionInterface;

abstract class SelectQuery
{    
    private ConnectionInterface $pdo;

    public function __construct(ConnectionInterface $pdo)
    {
        $this->pdo = $pdo;
    }
}
