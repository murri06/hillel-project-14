<?php

namespace App\Libraries\FormGenerator;

abstract class InputElement extends BaseElement
{
    protected array $arrayNames = [];

    public function __construct(protected int $number, protected string $names)
    {
        $this->arrayNames = $this->nameSplit($names);
    }

    protected function nameSplit(string $name): array
    {
        if ($this->number === 0) {
            return [];
        }
        return explode(',', $name);
    }

    public function validate(): bool
    {
        if ($this->number <= 0) {
            return false;
        }
        return count($this->arrayNames) === $this->number;
    }
}