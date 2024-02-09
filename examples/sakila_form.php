<?php

use Imadepurnamayasa\PhpInti\Crud\Form;
use Imadepurnamayasa\PhpInti\Database\PdoMysql;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PdoMysql();
$pdo->open('localhost', 3306, 'root', 'root', 'sakila');

$form = new Form($pdo);

$table = 'film';
$primaryKeys = [
    'film_id'
];
$columnTypes = [
    'last_update' => 'DATETIME'
];

$form->table($table);
$form->primaryKeys($primaryKeys);
$form->columnTypes($columnTypes);
echo $form->process();

$pdo->close();