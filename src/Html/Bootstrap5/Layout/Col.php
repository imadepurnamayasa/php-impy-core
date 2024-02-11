<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Col extends Element
{
    public function __construct()
    {
        parent::__construct('div');
        $this->addAttribute('class', 'col');
    }

    public function getContent(): string
    {
        return '';
    }
}
