<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Title extends Element
{
    private $text;

    public function __construct(string $text)
    {
        parent::__construct('title');
        $this->text = $text;
    }

    public function getContent(): string
    {
        return $this->text;
    }
}
