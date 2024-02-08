<?php

use Imadepurnamayasa\PhpInti\Html\Button;
use Imadepurnamayasa\PhpInti\Html\Form;
use Imadepurnamayasa\PhpInti\Html\Hr;
use Imadepurnamayasa\PhpInti\Html\Input;

require_once __DIR__ . '/../../vendor/autoload.php';

$username = new Input();
$username->addAttribute('placeholder', 'username');

$password = new Input();
$password->addAttribute('placeholder', 'password');

$save = new Button();
$save->setText('Save');
$save->setId('save');
$save->addAttribute('class', 'button');

$hr = new Hr();

$form = new Form();
echo $form
    ->addComponent('username', $username)
    ->addComponent('hr1', $hr)
    ->addComponent('password', $password)
    ->addComponent('hr2', $hr)
    ->addComponent('save', $save)
    ->render();