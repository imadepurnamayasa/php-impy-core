<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Nav extends Element
{
    public function __construct()
    {
        parent::__construct('nav');
    }

    public function getContent(): string
    {
        return '';
    }
}