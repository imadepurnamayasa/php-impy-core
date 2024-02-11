<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Footer extends Element
{
    public function __construct()
    {
        parent::__construct('footer');
    }

    public function getContent(): string
    {
        return '';
    }
}