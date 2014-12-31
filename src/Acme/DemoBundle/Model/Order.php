<?php

namespace Acme\DemoBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Order
{
    private $products;

    /**
     * @param array $products
     * @return Order
     */
    public static function createWithProducts(ArrayCollection $products)
    {
        return new self($products);
    }

    public function __construct(ArrayCollection $products)
    {
        $this->products = $products;
    }

    public function getList()
    {
        return $this->products;
    }

    public function bill()
    {
        $sum = 0;
        foreach ($this->products->toArray() as $product) {
            $sum += $product->getCost();
        }

        return $sum;
    }
}
