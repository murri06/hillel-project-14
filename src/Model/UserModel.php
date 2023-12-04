<?php

namespace App\Model;

use App\Libraries\FormGenerator\FormValidationRule;
use ReflectionAttribute;
use ReflectionClass;

class UserModel
{

    #[FormValidationRule('required')]
    #[FormValidationRule('minLength')]
    private string $firstName;

    #[FormValidationRule('required')]
    #[FormValidationRule('minLength')]
    private string $lastName;

    #[FormValidationRule('required')]
    #[FormValidationRule('email')]
    private string $email;

    #[FormValidationRule('required')]
    #[FormValidationRule('password')]
    #[FormValidationRule('minLength', 6)]
    private string $password;

    public function __construct(
        private array $postData)
    {
        $this->firstName = $this->postData['First_Name'];
        $this->lastName = $this->postData['Last_Name'];
        $this->email = $this->postData['Email'];
        $this->password = $this->postData['Password'];
    }

    public function processData(): array
    {
        $errors = [];
        $attributes = new ReflectionClass($this);
        $props = $attributes->getProperties();
        foreach ($props as $property) {
            $attributes = $property->getAttributes(FormValidationRule::class, ReflectionAttribute::IS_INSTANCEOF);

            foreach ($attributes as $attribute) {
                $attributeInstance = $attribute->newInstance();
                $method = $attributeInstance->method;
                $propertyName = $property->getName();

                if ($method === 'minLength') {
                    $errors[] = $this->$method($propertyName, $attributeInstance->length);
                } else {
                    $errors[] = $this->$method($propertyName);
                }
            }
        }
        return $errors;
    }

    public function required(string $name): string|null
    {
        return trim($this->$name) !== '' ? null : "$name is required!";
    }

    public function minLength(string $name, int $length): string|null
    {
        return mb_strlen($this->$name) > $length ? null : "Length for $name must be at least $length characters long!";
    }

    public function email(string $name): string|null
    {
        return !filter_var($this->$name, FILTER_VALIDATE_EMAIL) ? 'Wrong email!' : null;
    }

    public function password(string $name): string|null
    {
        return !preg_match('/^(?=.*?\d)(?=.*?[a-zA-Z])[a-zA-Z\d]+$/', $this->$name) ? 'Password must have characters and numbers!' : null;
    }
}