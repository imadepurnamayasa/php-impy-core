<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Div extends AbstractComponent
{
    public function render(): string
    {
        $html = '<div ';        
        $html .= $this->renderAttributes();
        $html .= '>';
        $html .= $this->renderComponents();
        $html .= '</div>';
        
        return $html;
    }
}