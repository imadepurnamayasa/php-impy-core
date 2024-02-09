<?php

use Imadepurnamayasa\PhpInti\Crud\Action;
use Imadepurnamayasa\PhpInti\Crud\Constants;
use Imadepurnamayasa\PhpInti\Crud\Data;
use Imadepurnamayasa\PhpInti\Crud\Form;
use Imadepurnamayasa\PhpInti\Database\PDOMySQL;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$form = new Form($pdo);
$data = new Data($pdo);
$action = new Action($pdo);

$table = 'crud';
$primaryKeys = [
    'id'
];
$columnTypes = [
    'dt' => Constants::DATA_TYPE_DATETIME
];

$action->table($table);
$action->primaryKeys($primaryKeys);
$action->columnTypes($columnTypes);
echo $action->process('insert');

$form->table($table);
$form->primaryKeys($primaryKeys);
$form->columnTypes($columnTypes);
echo $form->process();

$data->table($table);
$data->primaryKeys($primaryKeys);
$data->columnTypes($columnTypes);
echo $data->process();

$pdo->close();