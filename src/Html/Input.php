<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Input extends AbstractComponent
{
    public function render(): string
    {
        $html = '<input ';        
        $html .= $this->renderAttributes();
        $html .= '>';
        
        return $html;
    }
}