<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class H2 extends Element
{
    private $content;

    public function __construct(string $id, string $content)
    {
        parent::__construct('h2');
        $this->setId($id);
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
