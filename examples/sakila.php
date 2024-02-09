<?php

use Imadepurnamayasa\PhpInti\Crud\Constants;
use Imadepurnamayasa\PhpInti\Crud\Data;
use Imadepurnamayasa\PhpInti\Database\PdoMysql;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PdoMysql();
$pdo->open('localhost', 3306, 'root', 'root', 'sakila');

$data = new Data($pdo);

$table = 'film';
$primaryKeys = [
    'film_id'
];
$columnTypes = [
    'last_update' => Constants::DATA_TYPE_DATETIME
];

$data->table($table);
$data->primaryKeys($primaryKeys);
$data->columnTypes($columnTypes);
echo $data->process();

$pdo->close();