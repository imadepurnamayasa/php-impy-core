<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Html extends Element
{
    public function __construct()
    {
        parent::__construct('html');
    }

    public function getContent(): string
    {
        return '';
    }
}