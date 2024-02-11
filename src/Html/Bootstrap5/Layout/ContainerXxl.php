<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5\Layout;

use Imadepurnamayasa\PhpInti\Html\Element;

class ContainerXxl extends Element
{
    public function __construct()
    {
        parent::__construct('div');
        $this->addAttribute('class', 'container-xxl');
    }

    public function getContent(): string
    {
        return '';
    }
}
