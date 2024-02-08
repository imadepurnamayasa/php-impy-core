<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use Imadepurnamayasa\PhpInti\Database\IConnection;

interface Icrud
{
    public function __construct(IConnection $connection);
    public function table(string $table);
    public function primaryKeys(array $columns);
    public function columnTypes(array $columns);
    public function hideColumns(array $columns);
    public function process();
}