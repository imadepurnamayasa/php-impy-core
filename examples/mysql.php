<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$mysql = new PDOMySQL('localhost', 'information_schema', 'root', 'root');

Helpers::print_r($mysql);