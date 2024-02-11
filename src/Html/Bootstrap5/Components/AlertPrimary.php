<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5\Components;

use Imadepurnamayasa\PhpInti\Html\Element;

class AlertPrimary extends Element
{
    private $content;

    public function __construct(string $id, string $content)
    {
        parent::__construct('div');
        $this->setId($id);
        $this->content = $content;
        $this->addAttribute('class', 'alert alert-primary');
        $this->addAttribute('role', 'alert');
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
