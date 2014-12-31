<?php

namespace Acme\DemoBundle\Model;

class Product
{
    private $name;
    private $price;

    public static function createWithNameAndPrice($name, $price)
    {
        return new self($name, $price);
    }

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getCost()
    {
        return $this->price;
    }
}
