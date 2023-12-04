<?php

namespace App\Libraries\FormGenerator;

class TextField extends InputElement
{

    public function __construct(int $number, string $names, private array $type = [])
    {
        parent::__construct($number, $names);
    }

    public function render(): string
    {
        $render = '';
        foreach ($this->arrayNames as $key => $object) {
            $type = $this->type[$key] ?? 'text';
            $render .= "<label class='form-label'>$object : <input class='form-control' type='$type' name='$object'></label>";
        }
        return $render;
    }
}