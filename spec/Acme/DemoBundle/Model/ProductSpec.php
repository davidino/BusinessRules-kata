<?php

namespace spec\Acme\DemoBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProductSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('createWithNameAndPrice', array('macbook', 5));
    }

    function it_should_have_price()
    {
        $this->getCost()->shouldReturn(5);
    }
}
