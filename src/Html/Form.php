<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Form extends AbstractComponent
{
    public function render(): string
    {
        $html = '<form ';        
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->renderComponents();
        $html .= '</form>';
        
        return $html;
    }
}