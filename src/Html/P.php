<?php

namespace Imadepurnamayasa\PhpInti\Html;

class P extends Element
{
    private $text;

    public function __construct($text)
    {
        parent::__construct('p');
        $this->text = $text;
    }

    public function getContent() {
        return $this->text;
    }
}