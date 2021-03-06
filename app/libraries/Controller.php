<?php
//Base Controller
//It loads models and views

class Controller
{
    // Load Model
    public function model($model)
    {
        // require model file
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();
    }

    // Load View
    public function view($view, $data = [])
    {
        //Check for the view file
        if (file_exists('../app/views/' . $view . '.php')) {
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}