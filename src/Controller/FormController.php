<?php

namespace App\Controller;

use App\Core\Application;
use App\Core\Route;
use App\Libraries\FormGenerator\{Button, CheckBox, FormGenerator, RadioButton, Selector, TextField};

class FormController
{

    #[Route('POST', '/form')]
    public function form(): bool|string
    {
        $numberButtons = filter_input(INPUT_POST, 'numberButtons', FILTER_SANITIZE_NUMBER_INT);
        $numberText = filter_input(INPUT_POST, 'numberText', FILTER_SANITIZE_NUMBER_INT);
        $numberCheckbox = filter_input(INPUT_POST, 'numberCheckBox', FILTER_SANITIZE_NUMBER_INT);
        $numberOptions = filter_input(INPUT_POST, 'numberOptions', FILTER_SANITIZE_NUMBER_INT);
        $numberRadio = filter_input(INPUT_POST, 'numberRadio', FILTER_SANITIZE_NUMBER_INT);
        $namesButtons = filter_input(INPUT_POST, 'namesButtons', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $namesText = filter_input(INPUT_POST, 'namesText', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $namesCheckBox = filter_input(INPUT_POST, 'namesCheckBox', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $namesOptions = filter_input(INPUT_POST, 'namesOptions', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $namesRadio = filter_input(INPUT_POST, 'namesRadio', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $form = new FormGenerator();
        $form->addElement(new TextField($numberText, $namesText))
            ->addElement(new RadioButton($numberRadio, $namesRadio))
            ->addElement(new CheckBox($numberCheckbox, $namesCheckBox))
            ->addElement(new Selector($numberOptions, $namesOptions))
            ->addElement(new Button($numberButtons, $namesButtons));
        return Application::$app->view->render('form', (array)$form->render());
    }
}