<?php

namespace App\Libraries\FormGenerator;

class Selector extends InputElement
{

    public function render(): string
    {
        $render = '<select class="form-select">';
        foreach ($this->arrayNames as $object) {
            $render .= "<option value='$object'>$object";
        }
        $render .= '</select>';
        return $render;
    }
}