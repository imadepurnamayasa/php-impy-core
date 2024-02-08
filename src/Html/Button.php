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
        $html = '<button ';        
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->text;
        $html .= '</button>';
        
        return $html;
    }
}