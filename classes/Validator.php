<?php

abstract class Validator
{
    // options kaip params (pvz min max value)
    protected $options;
    public function __construct($options = [])
    {
        $this->options = $options;
    }

    abstract public function validate($value): bool;

    abstract public function getErrorText(): string;
}

class NumberValidator extends Validator
{
    public function validate($value): bool
    {
        return is_numeric($value);
    }

    public function getErrorText(): string
    {
        return 'turi but numeriuks, seniuk';
    }
}

class YearValidator extends NumberValidator
{

    public function __construct(int $min, int $max)
    {
        parent::__construct([
            'min' => $min,
            'max' => $max
        ]);
    }

    public function validate($value): bool
    {
        return parent::validate($value) && ($value > $this->options['min'] && $value < $this->options['max']);
    }

    public function getErrorText(): string
    {
        return 'labanakt';
    }
}

class MaxSymbolsValidator extends Validator
{
    public function __construct(int $max)
    {
        parent::__construct([
            'max' => $max
        ]);
    }

    public function validate($value): bool
    {
        return is_string($value) && strlen($value) <= $this->options['max'];
    }

    public function getErrorText(): string
    {
        return 'Max symbols exceeded. Only ' . $this->options['max'] . ' symbols allowed';
    }
}