<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5\Layout;

use Imadepurnamayasa\PhpInti\Html\Element;

class ContainerLg extends Element
{
    public function __construct()
    {
        parent::__construct('div');
        $this->addAttribute('class', 'container-lg');
    }

    public function getContent(): string
    {
        return '';
    }
}
