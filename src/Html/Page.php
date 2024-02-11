<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Page extends Element
{
    public function __construct()
    {
        parent::__construct('');
    }

    public function getContent(): string
    {
        return '<!DOCTYPE html>';
    }
}