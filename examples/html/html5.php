<?php

use Imadepurnamayasa\PhpInti\Html\Body;
use Imadepurnamayasa\PhpInti\Html\Footer;
use Imadepurnamayasa\PhpInti\Html\H1;
use Imadepurnamayasa\PhpInti\Html\H2;
use Imadepurnamayasa\PhpInti\Html\Head;
use Imadepurnamayasa\PhpInti\Html\Header;
use Imadepurnamayasa\PhpInti\Html\Html;
use Imadepurnamayasa\PhpInti\Html\Html5;
use Imadepurnamayasa\PhpInti\Html\Main;
use Imadepurnamayasa\PhpInti\Html\Meta;
use Imadepurnamayasa\PhpInti\Html\P;
use Imadepurnamayasa\PhpInti\Html\Page;
use Imadepurnamayasa\PhpInti\Html\Section;
use Imadepurnamayasa\PhpInti\Html\Text;
use Imadepurnamayasa\PhpInti\Html\Title;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$meta1 = new Meta();
$meta1->setId('meta1');
$meta1->addAttribute('charset', 'UTF-8');

$meta2 = new Meta();
$meta2->setId('meta2');
$meta2->addAttribute('name', 'viewport');
$meta2->addAttribute('content', 'width=device-width, initial-scale=1.0');

$title = new Title('title', 'HTML5 Example');

$head = new Head();
$head->setId('head');
$head->addElement($meta1);
$head->addElement($meta2);
$head->addElement($title);

$header = new Header();
$header->setId('header');

$section1 = new Section();
$section1->setId('section1');
$section1->addElement(new H2('section1h2', 'About Us'));
$section1->addElement(new P('section1p', 'This is a brief description of our company.'));

$section2 = new Section();
$section2->setId('section2');
$section2->addElement(new H2('section2h2', 'Contact Us'));
$section2->addElement(new P('section2p', 'You can reach us at example@example.com.'));

$main = new Main();
$main->setId('main');
$main->addElement($section1);
$main->addElement($section2);

$footer = new Footer();
$footer->setId('footer');
$footer->addElement(new P('footerp', '&copy; 2024 My Website. All rights reserved.'));

$body = new Body();
$body->setId('body');
$body->addElement($header);
$body->addElement($main);
$body->addElement($footer);

$html = new Html();
$html->setId('html');
$html->addAttribute('lang', 'en');
$html->addElement($head);
$html->addElement($body);

$page = new Page();
$page->addElement($html);
echo $page->render();

$html5 = new Html5('HTML5 Example');