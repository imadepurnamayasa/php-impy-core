<?php

use Imadepurnamayasa\PhpInti\Database\Query\Builder;

ini_set('display_errors', 1);

require_once __DIR__ . '/../vendor/autoload.php';

$queryBuilder = new Builder();

$query = $queryBuilder->table('orders')
    ->select('orders.id, orders.order_date, customers.name')
    ->join('INNER', 'customers', 'orders.customer_id', '=', 'customers.id')
    ->join('LEFT', 'products', 'orders.product_id', '=', 'products.id')
    ->where('orders.total_amount', '>', 1000)
    ->orderBy('orders.order_date', 'DESC')
    ->build();

echo $query;
