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
use Imadepurnamayasa\PhpInti\Html\Bootstrap5\Heroes;
use Imadepurnamayasa\PhpInti\Html\H1;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$html = new Heroes('Bootstrap 5 Heroes', 'Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.');
echo $html->render();