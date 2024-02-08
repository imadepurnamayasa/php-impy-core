<?php

use Imadepurnamayasa\PhpInti\Html\Component\Button;

require_once __DIR__ . '/../../../vendor/autoload.php';

$button = new Button();
$button->setText('button');
$button->setId('button');
$button->addAttribute('class', 'button');
echo $button->render();