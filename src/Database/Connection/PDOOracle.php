<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Connection;

class PDOOracle extends PDOConnection
{
    public function getDsn(): string
    {
        return "";
    }
}
