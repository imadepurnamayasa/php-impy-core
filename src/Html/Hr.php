<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Hr extends AbstractComponent
{
    public function render(): string
    {
        $html = '<hr ';        
        $html .= $this->renderAttributes();
        $html .= '>';
        
        return $html;
    }
}