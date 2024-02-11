<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Tag;

use Imadepurnamayasa\PhpInti\Html\Element;

class Header extends Element
{
    public function __construct()
    {
        parent::__construct('header');
    }

    public function getContent(): string
    {
        return '';
    }
}