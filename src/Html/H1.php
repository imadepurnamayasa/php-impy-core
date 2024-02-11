<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class H1 extends Element
{
    private $content;

    public function __construct(string $content)
    {
        parent::__construct('h1');
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
