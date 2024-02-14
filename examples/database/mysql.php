<?php

use Imadepurnamayasa\PhpInti\Database\Connection\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$mysql = new PDOMySQL('localhost', 3306, 'root', 'root', 'test');
$mysql->open();
Helpers::print_r($mysql);
$mysql->close();
Helpers::print_r($mysql);
