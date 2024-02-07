<?php

use Imadepurnamayasa\PhpInti\Database\PdoMysql;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = new PdoMysql();
echo 'buka = ' . $pdo->buka('localhost', 3306, 'root', 'root', 'information_schema');
echo '<br>';
echo 'bukaEnv = ' . $pdo->bukaEnv(__DIR__);
echo '<br>';
echo 'koneksi = ';
print_r($pdo->koneksi());
echo '<br>';

$stmt = $pdo->koneksi()->prepare('SELECT * FROM SCHEMATA');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
foreach ($result as $row) {
    echo '<pre>';
    print_r($row);    
    echo '</pre>';
}