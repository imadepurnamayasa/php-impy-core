<?php

require_once __DIR__ . '/../vendor/autoload.php';

$pagination = new Imadepurnamayasa\PhpInti\Pagination(100, 5, 'pagination.php?page=');
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$pagination->setCurrentPage($page);
$totalPages = $pagination->getTotalPages();
echo $pagination->generatePaginationHTML();