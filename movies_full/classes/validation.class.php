<?php

class Validation
{
    private $validation_errors = [];

    public function RequestMethod($requestMethod)
    {
        if ($_SERVER['REQUEST_METHOD'] === $requestMethod) {
            return true;
        }
    }

    public function checkPostValue($key)
    {
        if (isset($_POST[$key]) && trim($_POST[$key]) !== '') {
            return true;
        }
    }

    public function cleanPostValue($key)
    {
        $trimmed = trim($_POST[$key]);
        return htmlspecialchars($trimmed);
    }

    public function sanitizeValue($key)
    {
        if ($this->checkPostValue($key)) {
            return $this->cleanPostValue($key);
        } else {
            $this->validation_errors[$key] = 'not set or empty';
        }
    }

    public function getErrors()
    {
        if (!empty($this->validation_errors)) {
            return $this->validation_errors;
        } else {
            return null;
        }
    }

    public function showErrors()
    {
        if (!empty($this->validation_errors)) {
            var_dump($this->validation_errors);
        }
    }
}