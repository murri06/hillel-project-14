<?php

namespace App\Libraries\FormGenerator;

abstract class BaseElement
{

    abstract public function render(): string;
}