<?php

namespace Acme\DemoBundle\Model;

class Company
{

    public static function initWithOrder(Order $order)
    {
        return new self($order);
    }

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function processOrder()
    {
        return new PackageSlip($this->order->getList());
    }
}
