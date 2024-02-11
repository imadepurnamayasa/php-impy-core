<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Tag;

use Imadepurnamayasa\PhpInti\Html\Element;

class Title extends Element
{
    private $content;

    public function __construct(string $id, string $content)
    {
        parent::__construct('title');
        $this->setId($id);
        $this->content = $content;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
