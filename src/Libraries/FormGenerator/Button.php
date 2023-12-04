<?php

namespace App\Libraries\FormGenerator;

class Button extends InputElement
{

    public function render(): string
    {
        $render = '';
        foreach ($this->arrayNames as $object) {
            $render .= "<button class='btn btn-primary' name='$object'>$object</button>";
        }
        return $render;
    }

}