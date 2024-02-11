<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5\Layout;

use Imadepurnamayasa\PhpInti\Html\Element;

class Col extends Element
{
    public function __construct()
    {
        parent::__construct('div');
        $this->addAttribute('class', 'col');
    }

    public function getContent(): string
    {
        return '';
    }
}
