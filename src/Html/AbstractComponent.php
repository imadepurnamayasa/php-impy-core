<?php

namespace Imadepurnamayasa\PhpInti\Html;

abstract class AbstractComponent implements InterfaceComponent
{
    protected array $attributes = [];
    protected array $components = [];    

    public function setId(string $id)
    {
        $this->attributes['id'] = $id;
    }

    public function addAttribute(string $name, string $value)
    {
        $this->attributes[$name] = $value;
    }

    public function removeAttribute(string $name)
    {
        if (isset($this->attributes[$name])) {
            unset($this->attributes[$name]);
        }
    }

    public function getAttribute(string $name)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : null;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function addComponent(string $name, AbstractComponent $component)
    {
        $this->components[$name] = $component;
    }

    public function removeComponent(string $name)
    {
        if (isset($this->components[$name])) {
            unset($this->components[$name]);
        }
    }

    public function getComponent(string $name)
    {
        return isset($this->components[$name]) ? $this->components[$name] : null;
    }

    public function getComponents(): array
    {
        return $this->components;
    }

    public function renderAttributes(): string 
    {
        $output = '';
        foreach ($this->attributes as $name => $value) {
            $output .= $name . '="' . htmlspecialchars($value) . '" ';
        }
        return rtrim($output);
    }

    public function renderComponents(): string 
    {
        $output = '';
        foreach ($this->attributes as $component) {
            $output .= $component->render();
        }
        return $output;
    }
}
