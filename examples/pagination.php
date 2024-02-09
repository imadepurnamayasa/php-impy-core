<?php

use Imadepurnamayasa\PhpInti\Crud\Pagination;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$total = 100;
$limit = 5;

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;

$pagination = new Pagination($total, $limit, 'pagination.php?page=');
$pagination->setCurrentPage($page);

echo $pagination->generatePaginationHTML();