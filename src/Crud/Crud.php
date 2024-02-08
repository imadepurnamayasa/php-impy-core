<?php

namespace Imadepurnamayasa\PhpInti\Crud;

use Imadepurnamayasa\PhpInti\Database\Connection;

abstract class Crud
{
    protected Connection $connection;
    protected string $table = '';
    protected array $primaryKeys = [];
    protected array $columnTypes = [];
    protected array $hideColumns = [];

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function table(string $table)
    {
        $this->table = $table;
    }

    public function primaryKeys(array $columns)
    {
        $this->primaryKeys = $columns;
    }

    public function columnTypes(array $columns)
    {
        $this->columnTypes = $columns;
    }

    public function hideColumns(array $columns)
    {
        $this->hideColumns = $columns;
    }

    abstract public function process();
}