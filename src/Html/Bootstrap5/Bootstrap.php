<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html\Bootstrap5;

use Imadepurnamayasa\PhpInti\Html\Element;
use Imadepurnamayasa\PhpInti\Html\Tag\Body;
use Imadepurnamayasa\PhpInti\Html\Tag\Footer;
use Imadepurnamayasa\PhpInti\Html\Tag\Head;
use Imadepurnamayasa\PhpInti\Html\Tag\Header;
use Imadepurnamayasa\PhpInti\Html\Tag\Html;
use Imadepurnamayasa\PhpInti\Html\Tag\Link;
use Imadepurnamayasa\PhpInti\Html\Tag\Main;
use Imadepurnamayasa\PhpInti\Html\Tag\Meta;
use Imadepurnamayasa\PhpInti\Html\Tag\Script;
use Imadepurnamayasa\PhpInti\Html\Tag\Title;

class Bootstrap extends Element
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

        $linkbs = new Link();
        $linkbs->setId('linkbs');
        $linkbs->addAttribute('href', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
        $linkbs->addAttribute('rel', 'stylesheet');
        $linkbs->addAttribute('integrity', 'sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN');
        $linkbs->addAttribute('crossorigin', 'anonymous');

        $this->head = new Head();
        $this->head->setId('head');        
        $this->head->addElement($meta1);
        $this->head->addElement($meta2);
        $this->head->addElement(new Title('title', $title));
        $this->head->addElement($linkbs);

        $this->header = new Header();
        $this->header->setId('header');

        $this->main = new Main();
        $this->main->setId('main');

        $this->footer = new Footer();
        $this->footer->setId('footer');

        $scriptbs = new Script();
        $scriptbs->setId('scriptbs');
        $scriptbs->addAttribute('src', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js');
        $scriptbs->addAttribute('integrity', 'sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL');
        $scriptbs->addAttribute('crossorigin', 'anonymous');

        $this->script = new Script();
        $this->script->setId('script');

        $this->body = new Body();
        $this->body->setId('body');
        $this->body->addElement($this->header);
        $this->body->addElement($this->main);
        $this->body->addElement($this->footer);
        $this->body->addElement($scriptbs);
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
