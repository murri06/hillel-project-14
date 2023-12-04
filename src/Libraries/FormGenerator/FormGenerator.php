<?php

namespace App\Libraries\FormGenerator;

class FormGenerator extends BaseElement
{


    protected array $elements = [];

    public function __construct(private string $method = 'get', private string $action = '/')
    {
    }

    public function addElement(InputElement $element): self
    {
        $this->elements[] = $element;
        return $this;
    }

    public function render(): string
    {
        $content = '';
        foreach ($this->elements as $object) {
            if ($object->validate()) {
                $content .= $object->render() . "<br>";
            }
        }
        return "<form method='$this->method' action='$this->action' style='margin: 20px ;max-width: 300px'> $content</form>";
    }
}