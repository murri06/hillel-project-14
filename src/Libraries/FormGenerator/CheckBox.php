<?php

namespace App\Libraries\FormGenerator;

class CheckBox extends InputElement
{

    public function render(): string
    {
        $render = '';
        foreach ($this->arrayNames as $object) {
            $render .= "<label class='form-check-label'><input class='form-check-input' type='checkbox' name='$object' value='$object'>$object</label>";
        }
        return $render;
    }
}