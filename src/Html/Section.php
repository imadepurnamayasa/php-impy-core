<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Section extends Element
{
    public function __construct()
    {
        parent::__construct('section');
    }

    public function getContent(): string
    {
        return '';
    }
}