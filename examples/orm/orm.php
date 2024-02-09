<?php

use Imadepurnamayasa\PhpInti\Database\PDOMySQL;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

// Example usage
$pdo = new PDOMySQL('localhost', 'test', 'root', 'root');
$orm = new ORM($pdo, 'users');

// Find a user by ID
$user = $orm->find(1);
var_dump($user);

// Find all users
$users = $orm->findAll();
var_dump($users);

// Create a new user
$newUserId = $orm->create(['username' => 'john_doe', 'email' => 'john@example.com']);
var_dump($newUserId);

// Update user with ID 1
$updateResult = $orm->update(1, ['username' => 'jane_doe']);
var_dump($updateResult);

// Delete user with ID 2
$deleteResult = $orm->delete(2);
var_dump($deleteResult);

// Find users with specific conditions
$filteredUsers = $orm->where(['username = ?'], ['john_doe']);
var_dump($filteredUsers);

// Custom query
$customQuery = $orm->query("SELECT * FROM users WHERE username LIKE ?", ['%doe%']);
var_dump($customQuery);