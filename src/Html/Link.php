<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Link extends Element
{
    public function __construct()
    {
        parent::__construct('link');
    }

    public function getContent(): string
    {
        return '';
    }
}