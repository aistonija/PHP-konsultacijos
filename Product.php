<?php


class Product
{
    private $title;
    private $code;
    private $quantity;
    private $price;

    public function __construct($title, $code, $quantity, $price)
    {
        $this->title = $title;
        $this->code = $code;
        $this->quantity = $quantity;
        $this->price = $price;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function decreaseQuantity()
    {
        $this->quantity--;
    }
}