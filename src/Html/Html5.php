<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

class Html5 extends Element
{
    protected $head;
    protected $header;
    protected $main;
    protected $footer;
    protected $body;

    public function __construct(string $title)
    {
        parent::__construct('');

        $meta1 = new Meta();
        $meta1->setId('meta1');
        $meta1->addAttribute('charset', 'UTF-8');

        $meta2 = new Meta();
        $meta2->setId('meta2');
        $meta2->addAttribute('name', 'viewport');
        $meta2->addAttribute('content', 'width=device-width, initial-scale=1.0');

        $this->head = new Head();
        $this->head->setId('head');
        $this->head->addElement(new Title('title', $title));
        $this->head->addElement($meta1);
        $this->head->addElement($meta2);

        $this->header = new Header();
        $this->header->setId('header');

        $this->main = new Main();
        $this->main->setId('main');

        $this->footer = new Footer();
        $this->footer->setId('footer');

        $this->body = new Body();
        $this->body->setId('body');
        $this->body->addElement($this->header);
        $this->body->addElement($this->main);
        $this->body->addElement($this->footer);

        $html = new Html();
        $html->setId('html');
        $html->addAttribute('lang', 'en');
        $html->addElement($this->head);
        $html->addElement($this->body);

        $this->addElement($html);
    }

    public function getContent(): string
    {
        return '';
    }

    public function getHead()
    {
        return $this->head;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getMain()
    {
        return $this->main;
    }

    public function getFooter()
    {
        return $this->footer;
    }
}
