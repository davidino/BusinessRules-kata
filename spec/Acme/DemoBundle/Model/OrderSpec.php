<?php

namespace spec\Acme\DemoBundle\Model;

use Acme\DemoBundle\Model\Product;
use Doctrine\Common\Collections\ArrayCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;


/**
 * @mixin MyClass
 */
class OrderSpec extends ObjectBehavior
{
    function let(ArrayCollection $products)
    {
        $this->beConstructedThrough('createWithProducts', array($products));
    }

    function it_should_show_the_products()
    {
        $this->getList()->shouldHaveType('Doctrine\Common\Collections\ArrayCollection');
    }

    function it_should_calculate_the_sum(ArrayCollection $products)
    {
        $products->toArray()->willReturn([
            Product::createWithNameAndPrice('Macbook pro', 5),
            Product::createWithNameAndPrice('Macbook air', 5)
        ]);

        $this->bill()->shouldReturn(10);
    }
}
