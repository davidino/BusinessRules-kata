<?php

namespace spec\Davidino\DomainBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuestionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Davidino\DomainBundle\Model\Question');
    }
}
