<?php

use Imadepurnamayasa\PhpInti\Html\Button;
use Imadepurnamayasa\PhpInti\Html\Form;
use Imadepurnamayasa\PhpInti\Html\Hr;
use Imadepurnamayasa\PhpInti\Html\Html5;
use Imadepurnamayasa\PhpInti\Html\Input;
use Imadepurnamayasa\PhpInti\Html\P;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$username = new Input('text');
$username->setId('username');
$username->addAttribute('name', 'username');
$username->addAttribute('placeholder', 'username');

$password = new Input('password');
$password->setId('password');
$password->addAttribute('name', 'password');
$password->addAttribute('placeholder', 'password');

$login = new Button('submit', 'Login');
$login->setId('login');

$form = new Form();
$form->addAttribute('action', 'action_login_username.php');
$form->addAttribute('method', 'post');
$form
    ->addElement(new P('p1', 'Please insert your username and password'))
    ->addElement($username)
    ->addElement(new Hr('hr1'))
    ->addElement($password)
    ->addElement(new Hr('hr2'))
    ->addElement($login);

$html5 = new Html5('Form Login by Username');
$html5->getMain()->addElement($form);
echo $html5->render();