<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Database\Query;

abstract class DeleteQuery
{    
    public static function byId(string $table)
    {
        $sql = "DELETE FROM $table WHERE id = :id";

        return $sql;
    }
}
