<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Hr extends Element
{
    public function __construct()
    {
        parent::__construct('hr');
    }

    public function getContent(): string
    {
        return '';
    }
}