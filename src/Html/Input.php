<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Input extends Element
{    
    public function __construct($type)
    {
        parent::__construct('input');
        $this->addAttribute('type', $type);
    }

    public function getContent()
    {
    }
}
