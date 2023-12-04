<?php

namespace App\Libraries\FormGenerator;

class RadioButton extends InputElement
{

    public function render(): string
    {
        $render = '';
        foreach ($this->arrayNames as $object) {
            $render .= "<label class='form-check-label'><input class='form-check-input' type='radio' name='radio' value='$object'>$object</label>";
        }
        return $render;
    }
}