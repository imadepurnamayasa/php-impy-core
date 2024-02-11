<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Tag;

use Imadepurnamayasa\PhpInti\Html\Element;

class Input extends Element
{    
    public function __construct(string $type)
    {
        parent::__construct('input');
        $this->addAttribute('type', $type);
    }

    public function getContent(): string
    {
        return '';
    }
}
