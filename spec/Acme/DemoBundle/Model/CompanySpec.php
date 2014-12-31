<?php

namespace spec\Acme\DemoBundle\Model;

use Acme\DemoBundle\Model\Order;
use Acme\DemoBundle\Model\Product;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CompanySpec extends ObjectBehavior
{
    function let(Order $order)
    {
        $this->beConstructedThrough('initWithOrder', array($order));
    }

    function it_should_process_the_order(Order $order)
    {
        $order->getList()->willReturn(new ArrayCollection([
                Product::createWithNameAndPrice('Macbook pro', 5),
                Product::createWithNameAndPrice('Macbook air', 5)
         ]));

        $this->processOrder()->shouldHaveType('\Acme\DemoBundle\Model\PackageSlip');
    }
}
