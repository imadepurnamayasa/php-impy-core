<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/User.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$user = new User($pdo, 'users');

// Create a new user
$newUserId = $user->create([
    'username' => 'johndoe', 
    'password' => Helpers::hashDefault('johndoe'),
    'email' => 'johndoe@example.com'
]);
Helpers::print_r($newUserId);