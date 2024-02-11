<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5;

use Imadepurnamayasa\PhpInti\Html\Tag\Div;
use Imadepurnamayasa\PhpInti\Html\Tag\H1;
use Imadepurnamayasa\PhpInti\Html\Tag\P;

class Heroes extends Bootstrap
{
    public function __construct(string $title, string $description)
    {
        parent::__construct($title);
        
        $header = new H1('heroesheader', $title);
        $header->addAttribute('class', 'display-5 fw-bold text-body-emphasis');

        $description = new P('heroesdescription', $description);
        $description->addAttribute('class', 'lead mb-4'); 

        $descriptionContainer = new Div('');
        $descriptionContainer->setId('heroesdescriptioncontainer');
        $descriptionContainer->addAttribute('class', 'col-lg-6 mx-auto'); 
        $descriptionContainer->addElement($description);

        $container = new Div('');
        $container->setId('heroescontainer');
        $container->addAttribute('class', 'px-4 py-5 my-5 text-center'); 
        $container->addElement($header); 
        $container->addElement($descriptionContainer); 
        
        $this->main->addElement($container);
    }
}
