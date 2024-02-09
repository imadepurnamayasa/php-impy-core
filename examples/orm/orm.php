<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;
use Imadepurnamayasa\PhpInti\Helpers;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/Test.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$orm = new Test($pdo, 'users');

// Find a user by ID
$user = $orm->findById(1);
Helpers::print_r($user);

// Find all users
$users = $orm->findAll();
Helpers::print_r($users);

// Create a new user
$newUserId = $orm->create(['username' => 'john_doe', 'email' => 'john@example.com']);
Helpers::print_r($newUserId);

// Update user with ID 1
$updateResult = $orm->update(1, ['username' => 'jane_doe']);
Helpers::print_r($updateResult);

// Delete user with ID 2
$deleteResult = $orm->delete(2);
Helpers::print_r($deleteResult);

// Find users with specific conditions
$filteredUsers = $orm->where(['username = ?'], ['john_doe']);
Helpers::print_r($filteredUsers);

// Custom query
$customQuery = $orm->query("SELECT * FROM users WHERE username LIKE ?", ['%doe%']);
Helpers::print_r($customQuery);