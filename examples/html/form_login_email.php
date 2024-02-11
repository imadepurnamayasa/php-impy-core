<?php

use Imadepurnamayasa\PhpInti\Html\Body;
use Imadepurnamayasa\PhpInti\Html\Button;
use Imadepurnamayasa\PhpInti\Html\Form;
use Imadepurnamayasa\PhpInti\Html\Hr;
use Imadepurnamayasa\PhpInti\Html\Html;
use Imadepurnamayasa\PhpInti\Html\Input;
use Imadepurnamayasa\PhpInti\Html\P;
use Imadepurnamayasa\PhpInti\Html\Title;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$p1 = new P('p1', 'Please insert your email and password');

$email = new Input('text');
$email->setId('email');
$email->addAttribute('name', 'email');
$email->addAttribute('placeholder', 'email');

$password = new Input('password');
$password->setId('password');
$password->addAttribute('name', 'password');
$password->addAttribute('placeholder', 'password');

$login = new Button('submit', 'Login');
$login->setId('login');

$form = new Form();
$form->addAttribute('action', 'action_login_email.php');
$form->addAttribute('method', 'post');
$form
    ->addElement($p1)
    ->addElement($email)
    ->addElement(new Hr('hr1'))
    ->addElement($password)
    ->addElement(new Hr('hr2'))
    ->addElement($login);

$body = new Body();
$body->setId('body');
$body->addElement($form);

$html = new Html();
$html->setId('html');
$html->addElement($body);
echo $html->render();