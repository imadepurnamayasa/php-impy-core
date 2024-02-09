<?php

declare(strict_types=1);

namespace Imadepurnamayasa\PhpInti\Html;

abstract class Element implements Renderable
{
    protected string $tag;
    protected static array $selfClosingTags = [
        'img',
        'br',
        'hr',
        'input',
        'meta',
        'link',
        'base',
        'col',
        'area',
        'embed',
        'param',
        'source',
        'track',
        'wbr'
    ];
    protected array $attributes;
    protected array $elements;

    public function __construct($tag)
    {
        $this->tag = $tag;
        $this->attributes = [];
        $this->elements = [];
    }

    public function setId(string $id)
    {
        $this->attributes['id'] = $id;
    }

    public function getId(): string
    {
        return isset($this->attributes['id']) ? $this->attributes['id'] : '';
    }

    public function addAttribute(string $name, string $value)
    {
        $this->attributes[$name] = $value;

        return $this;
    }

    public function removeAttribute(string $name)
    {
        if (isset($this->attributes[$name])) {
            unset($this->attributes[$name]);
        }

        return $this;
    }

    public function getAttribute(string $name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function addElement(Element $element)
    {
        $this->elements[$element->getId()] = $element;

        return $this;
    }

    public function removeElement(string $id)
    {
        if (isset($this->elements[$id])) {
            unset($this->elements[$id]);
        }

        return $this;
    }

    public function getElement(string $name)
    {
        return isset($this->elements[$name]) ? $this->elements[$name] : null;
    }

    public function getElements(): array
    {
        return $this->elements;
    }

    public function renderAttributes(): string
    {
        $html = ' ';

        foreach ($this->attributes as $name => $value) {
            $html .= $name . '="' . htmlspecialchars($value) . '" ';
        }

        return rtrim($html);
    }

    public function renderElements(): string
    {
        $html = '';

        foreach ($this->elements as $element) {
            $html .= $element->render();
        }

        return $html;
    }

    public function render(): string
    {
        $html = '';
        if (!empty($this->tag)) {
            $html .= '<' . $this->tag;
        }
        $html .= $this->renderAttributes();

        if ($this->isSelfClosing()) {
            if (!empty($this->tag)) {
                $html .= ' />';
            }
        } else {
            if (!empty($this->tag)) {
                $html .= '>';
            }
            $html .= $this->getContent();
            $html .= $this->renderElements();
            if (!empty($this->tag)) {
                $html .= '</' . $this->tag . '>';
            }
        }

        return $html;
    }

    abstract public function getContent(): string;

    protected function isSelfClosing(): bool
    {
        return in_array($this->tag, self::$selfClosingTags);
    }
}
