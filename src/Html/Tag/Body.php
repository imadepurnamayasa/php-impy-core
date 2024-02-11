<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Tag;

use Imadepurnamayasa\PhpInti\Html\Element;

class Body extends Element
{
    public function __construct()
    {
        parent::__construct('body');
    }

    public function getContent(): string
    {
        return '';
    }
}