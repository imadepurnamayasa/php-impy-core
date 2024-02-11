<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Row extends Element
{
    public function __construct()
    {
        parent::__construct('div');
        $this->addAttribute('class', 'row');
    }

    public function getContent(): string
    {
        return '';
    }
}
