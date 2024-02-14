<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Query;

abstract class InsertQuery
{    
    public static function default(string $table, array $data = [])
    {
        $sql = "INSERT INTO $table (";
        $sql .= implode(", ", array_keys($data));
        $sql .= ") VALUES (";
        $sql .= ":" . implode(", :", array_keys($data));
        $sql .= ")";

        return $sql;
    }
}
