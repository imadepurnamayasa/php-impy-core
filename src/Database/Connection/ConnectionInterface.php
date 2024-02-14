<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Connection;

use PDO;

interface ConnectionInterface
{
    public function open(): bool;
    public function close(): void;
    public function getConnection(): PDO;
    public function getDsn(): string;
}
