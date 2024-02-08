<?php

ini_set('display_errors', 1);

use Imadepurnamayasa\PhpInti\Crud\Action;
use Imadepurnamayasa\PhpInti\Crud\Data;
use Imadepurnamayasa\PhpInti\Crud\Form;
use Imadepurnamayasa\PhpInti\Database\PdoMysql;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PdoMysql();
$form = new Form($pdo);
$data = new Data($pdo);
$action = new Action($pdo);

// echo 'open = ' . $pdo->open('localhost', 3306, 'root', 'root', 'test');
// echo '<br>';
echo 'openEnv = ' . $pdo->openEnv(__DIR__);
echo '<br>';
echo 'koneksi = ';
print_r($pdo->connection());
echo '<br>';

$table = 'crud';
$columnTypes = [
    'dt' => 'DATETIME'
];

$action->table($table);
$action->columnTypes($columnTypes);
echo $action->process();

$form->table($table);
$form->columnTypes($columnTypes);
$form->process();

$data->table($table);
$data->columnTypes($columnTypes);
$data->process();

$pdo->close();