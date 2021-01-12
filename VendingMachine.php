<?php


class VendingMachine
{
    private $products;

    public function __construct($items)
    {
        $this->products = $items;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function productExists($code)
    {
        foreach ($this->getProducts() as $item) {
            if ($item->getCode() === $code) {
                return $item;
            }
        }

        return false;
    }

}