<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Table;

use Imadepurnamayasa\PhpInti\Database\Connection\ConnectionInterface;

abstract class truncateTable
{    
    private ConnectionInterface $pdo;

    public function __construct(ConnectionInterface $pdo)
    {
        $this->pdo = $pdo;
    }
}
