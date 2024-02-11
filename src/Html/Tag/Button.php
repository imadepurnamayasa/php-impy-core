<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Tag;

use Imadepurnamayasa\PhpInti\Html\Element;

class Button extends Element
{
    private $text;

    public function __construct(string $type, string $text)
    {
        parent::__construct('button');
        $this->addAttribute('type', $type);
        $this->text = $text;
    }

    public function getContent(): string
    {
        return $this->text;
    }
}
