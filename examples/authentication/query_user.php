<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$user = new User($pdo, 'users');

// Custom query
$customQuery = $user->queryAll("SELECT * FROM users WHERE username LIKE ?", ['%doe%']);
Helpers::print_r($customQuery);

$customQuery = $user->queryOne("SELECT * FROM users WHERE username LIKE ?", ['%doe%']);
Helpers::print_r($customQuery);