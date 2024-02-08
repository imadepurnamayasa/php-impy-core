<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Title extends Element
{
    private $text;

    public function __construct($text)
    {
        parent::__construct('title');
        $this->text = $text;
    }

    public function getContent() {
        return $this->text;
    }
}