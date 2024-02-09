<?php

use Imadepurnamayasa\PhpInti\Crud\Action;
use Imadepurnamayasa\PhpInti\Database\PdoMysql;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PdoMysql();
$pdo->open('localhost', 3306, 'root', 'root', 'sakila');

$action = new Action($pdo);

$table = 'film';
$primaryKeys = [
    'film_id'
];
$columnTypes = [
    'last_update' => 'DATETIME'
];

$action->table($table);
$action->primaryKeys($primaryKeys);
$action->columnTypes($columnTypes);
echo $action->process('insert');

$pdo->close();