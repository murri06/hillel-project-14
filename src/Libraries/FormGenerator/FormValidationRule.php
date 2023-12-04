<?php

namespace App\Libraries\FormGenerator;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
class FormValidationRule
{

    public function __construct(
        public string $method,
        public int    $length = 2
    )
    {
    }
}