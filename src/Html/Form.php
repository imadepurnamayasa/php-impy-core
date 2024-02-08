<?php

namespace Imadepurnamayasa\PhpInti\Html;

class Form extends AbstractComponent
{
    
    public function hr()
    {
        return '<hr>';
    }
    
    // Function to generate text input
    public function textInput($name, $label, $value = '') {
        return "<label for='$name'>$label</label><input type='text' id='$name' name='$name' value='$value'>";
    }
    
    // Function to generate textarea
    public function textarea($name, $label, $value = '') {
        return "<label for='$name'>$label</label><textarea id='$name' name='$name'>$value</textarea>";
    }
    
    // Function to generate select dropdown
    public function select($name, $label, $options, $selected = '') {
        $select = "<label for='$name'>$label</label><select id='$name' name='$name'>";
        foreach ($options as $value => $text) {
            $select .= "<option value='$value'" . ($selected == $value ? " selected" : "") . ">$text</option>";
        }
        $select .= "</select>";
        return $select;
    }
    
    // Function to generate checkbox
    public function checkbox($name, $label, $value, $checked = false) {
        $checkbox = "<label for='$name'>$label</label>";
        $checkbox .= "<input type='checkbox' id='$name' name='$name' value='$value'" . ($checked ? " checked" : "") . ">";
        return $checkbox;
    }
    
    // Function to generate radio buttons
    public function radio($name, $label, $options, $checked = '') {
        $radio = "<label>$label</label>";
        foreach ($options as $value => $text) {
            $radio .= "<input type='radio' id='{$name}_{$value}' name='$name' value='$value'" . ($checked == $value ? " checked" : "") . ">$text";
        }
        return $radio;
    }

    public function render(): string
    {
        return '';
    }
}