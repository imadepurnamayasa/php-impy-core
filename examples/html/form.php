<?php

use Imadepurnamayasa\PhpInti\Html\Button;
use Imadepurnamayasa\PhpInti\Html\Form;

require_once __DIR__ . '/../../vendor/autoload.php';

$form = new Form();

$button = new Button();
$button->setText('button');
$button->setId('button');
$button->addAttribute('class', 'button');

$form->addComponent('button', $button);

echo $form->render();