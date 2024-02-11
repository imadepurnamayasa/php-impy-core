<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Head extends Element
{
    public function __construct()
    {
        parent::__construct('head');
    }

    public function getContent(): string
    {
        return '';
    }
}