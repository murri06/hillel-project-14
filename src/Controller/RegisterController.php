<?php

namespace App\Controller;

use App\Core\Application;
use App\Core\Route;
use App\Model\UserModel;
use App\Libraries\FormGenerator\{Button, FormGenerator, TextField};

class RegisterController
{
    #[Route('GET', '/register')]
    public function register(): bool|string
    {
        $form = new FormGenerator('post', '/register');
        $form->addElement(new TextField(4, 'First Name,Last Name,Email,Password', ['text', 'text', 'email', 'password']))
            ->addElement(new Button(1, 'Register'));
        return Application::$app->view->render('register', (array)$form->render());
    }

    #[Route('POST', '/register')]
    public function registerValidation(): bool|string
    {
        $form = new FormGenerator('post', '/register');
        $form->addElement(new TextField(4, 'First Name,Last Name,Email,Password', ['text', 'text', 'email', 'password']))
            ->addElement(new Button(1, 'Register'));
        $output[] = $form->render();

        $user = new UserModel($_POST);
        $errors = $user->processData();
        $output = array_merge($output, $errors);
        return Application::$app->view->render('register', $output);
    }
}