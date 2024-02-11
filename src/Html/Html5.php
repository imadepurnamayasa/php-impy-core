<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

use Imadepurnamayasa\PhpInti\Html\Tag\Body;
use Imadepurnamayasa\PhpInti\Html\Tag\Footer;
use Imadepurnamayasa\PhpInti\Html\Tag\Head;
use Imadepurnamayasa\PhpInti\Html\Tag\Header;
use Imadepurnamayasa\PhpInti\Html\Tag\Html;
use Imadepurnamayasa\PhpInti\Html\Tag\Main;
use Imadepurnamayasa\PhpInti\Html\Tag\Meta;
use Imadepurnamayasa\PhpInti\Html\Tag\Script;
use Imadepurnamayasa\PhpInti\Html\Tag\Title;

class Html5 extends Element
{
    protected $head;
    protected $body;
    protected $header;
    protected $main;
    protected $footer;    
    protected $script;

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
        $this->head->addElement($meta1);
        $this->head->addElement($meta2);
        $this->head->addElement(new Title('title', $title));

        $this->header = new Header();
        $this->header->setId('header');

        $this->main = new Main();
        $this->main->setId('main');

        $this->footer = new Footer();
        $this->footer->setId('footer');

        $this->script = new Script();
        $this->script->setId('script');

        $this->body = new Body();
        $this->body->setId('body');
        $this->body->addElement($this->header);
        $this->body->addElement($this->main);
        $this->body->addElement($this->footer);
        $this->body->addElement($this->script);

        $html = new Html();
        $html->setId('html');
        $html->addAttribute('lang', 'en');
        $html->addElement($this->head);
        $html->addElement($this->body);

        $this->addElement($html);
    }

    public function getContent(): string
    {
        return '<!DOCTYPE html>';
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

    public function getScript()
    {
        return $this->script;
    }
}
