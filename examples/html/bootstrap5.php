<?php

use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Bootstrap;
use Imadepurnamayasa\PhpInti\Html\H1;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$html = new Bootstrap('Bootstrap 5 example');
$html->getMain()->addElement(new H1('h1', 'Hello, world!'));
echo $html->render();