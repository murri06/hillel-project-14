<?php

namespace App\Controller;

use App\{Libraries\FormGenerator\Button,
    Libraries\FormGenerator\CheckBox,
    Libraries\FormGenerator\FormGenerator,
    Libraries\FormGenerator\RadioButton,
    Libraries\FormGenerator\Selector,
    Libraries\FormGenerator\TextField
};
use App\Core\Application;
use App\Core\Route;

class HomeController
{
    #[Route('GET', '/')]
    #[Route('GET', '/home')]
    public function home(): bool|string
    {
        $form = new FormGenerator();
        $form->addElement(new TextField(1, 'Example'))
            ->addElement(new RadioButton(2, 'Example 1,Example 2'))
            ->addElement(new Selector(3, 'Example 1,Example 2, Example 3'))
            ->addElement(new CheckBox(1, 'Example'))
            ->addElement(new Button(1, 'Example'));
        return Application::$app->view->render('home', (array)$form->render());
    }


}