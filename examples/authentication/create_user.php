<?php

use Imadepurnamayasa\PhpInti\Database\Connection\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 3306, 'root', 'root', 'test');
$pdo->open();
$user = new User($pdo, 'users');

// Create a new user
$newUserId = $user->create([
    'username' => 'johndoe', 
    'password' => Helpers::passwordHashDefault('johndoe'),
    'email' => 'johndoe@example.com'
]);
Helpers::print_r($newUserId);