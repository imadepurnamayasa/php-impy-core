<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Button extends AbstractComponent
{
    protected $text;

    public function setText($text)
    {
        $this->text = $text;
    }

    public function render(): string
    {
        $button = '<button ';
        
        $button .= $this->renderAttributes();

        $button .= '>' . $this->text . '</button>';

        return $button;
    }
}