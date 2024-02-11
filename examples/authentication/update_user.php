<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$orm = new User($pdo, 'users');

// Update user with ID 1
$updateResult = $orm->update(1, [
    'email' => 'johndoe1@example.com'
]);
Helpers::print_r($updateResult);