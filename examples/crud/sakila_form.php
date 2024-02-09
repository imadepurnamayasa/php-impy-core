<?php

use Imadepurnamayasa\PhpInti\Crud\Constants;
use Imadepurnamayasa\PhpInti\Crud\Form;
use Imadepurnamayasa\PhpInti\Database\PdoMysql;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$pdo = new PDOMySQL('localhost', 'sakila', 'root', 'root');

$form = new Form($pdo);

$table = 'film';
$primaryKeys = [
    'film_id'
];
$columnTypes = [
    'last_update' => Constants::DATA_TYPE_DATETIME
];

$form->table($table);
$form->primaryKeys($primaryKeys);
$form->columnTypes($columnTypes);
echo $form->process();

$pdo->close();