<?php

use Imadepurnamayasa\PhpInti\Html\Html5;
use Imadepurnamayasa\PhpInti\Html\Tag\H2;
use Imadepurnamayasa\PhpInti\Html\Tag\P;
use Imadepurnamayasa\PhpInti\Html\Tag\Section;

ini_set('display_errors', 1);

require_once __DIR__ . '/../../vendor/autoload.php';

$section1 = new Section();
$section1->setId('section1');
$section1->addElement(new H2('section1h2', 'About Us'));
$section1->addElement(new P('section1p', 'This is a brief description of our company.'));

$section2 = new Section();
$section2->setId('section2');
$section2->addElement(new H2('section2h2', 'Contact Us'));
$section2->addElement(new P('section2p', 'You can reach us at example@example.com.'));

$html5 = new Html5('HTML5 Example');
$html5->getMain()->addElement($section1);
$html5->getMain()->addElement($section2);
$html5->getFooter()->addElement(new P('footerp', '&copy; 2024 My Website. All rights reserved.'));
echo $html5->render();