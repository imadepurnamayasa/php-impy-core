<?php

use Imadepurnamayasa\PhpInti\Crud\GridManager;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$grid = new GridManager(1, 3);
$grid->setColumnHeader(0, 'Header 1');
$grid->setColumnHeader(1, 'Header 2');
$grid->setColumnHeader(2, 'Header 3');
$grid->setCellValue(0, 0, 'A1');
$grid->setCellValue(0, 1, 'B1');
$grid->setCellValue(0, 2, 'C1');
$grid->addRow();
$grid->setCellValue(1, 0, 'A2');
$grid->setCellValue(1, 1, 'B2');
$grid->setCellValue(1, 2, 'C2');
echo $grid->renderTable();