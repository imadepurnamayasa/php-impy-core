<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Button extends Element
{
    private $text;

    public function __construct($type, $text)
    {
        parent::__construct('button');
        $this->addAttribute('type', $type);
        $this->text = $text;
    }

    public function getContent() {
        return $this->text;
    }
}
