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

    private function productExists($code)
    {
        foreach ($this->products as $item) {
            if ($item->getCode() === $code) {
                return $item;
            }
        }

        return false;
    }

    public function vend($code, $amount)
    {
        $item = $this->productExists($code);

        if (!$item) {
            return 'Invalid Selection';
        }

        if ($item->getQuantity() < 1) {
            return $item->getTitle() . ' is Out of Stock';
        }

        if ($item->getPrice() > $amount) {
            return 'Not enough Money';
        }

        $item->decreaseQuantity();

        if ($item->getPrice() === $amount) {
            return 'Vending ' . $item->getTitle();
        } else {
            $change = number_format($amount - $item->getPrice(), 2);
            return 'Vending ' . $item->getTitle() . ' with ' . $change . ' Eur change';
        }
    }
}