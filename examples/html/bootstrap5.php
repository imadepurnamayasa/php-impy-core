<?php

use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Bootstrap;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertDanger;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertDark;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertInfo;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertLight;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertPrimary;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertSecondary;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertSuccess;
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components\AlertWarning;
use Imadepurnamayasa\PhpInti\Html\H1;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$html = new Bootstrap('Bootstrap 5 example');
$html->getMain()->addElement(new H1('h1', 'Hello, world!'));
$html->getMain()->addElement(new AlertPrimary('alert1', 'Hello, world!'));
$html->getMain()->addElement(new AlertSecondary('alert2', 'Hello, world!'));
$html->getMain()->addElement(new AlertDark('alert3', 'Hello, world!'));
$html->getMain()->addElement(new AlertLight('alert4', 'Hello, world!'));
$html->getMain()->addElement(new AlertDanger('alert5', 'Hello, world!'));
$html->getMain()->addElement(new AlertInfo('alert6', 'Hello, world!'));
$html->getMain()->addElement(new AlertSuccess('alert7', 'Hello, world!'));
$html->getMain()->addElement(new AlertWarning('alert8', 'Hello, world!'));
echo $html->render();