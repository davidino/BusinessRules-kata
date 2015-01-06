<?php

namespace spec\Davidino\DomainBundle\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Davidino\DomainBundle\Model\Question;

class QuizSpec extends ObjectBehavior
{
    private $removablequestion;

    function let(Question $removablequestion)
    {
        $this->removablequestion = $removablequestion;

        $this->beConstructedWith(array(
            new Question(),
            new Question(),
            $this->removablequestion
        ));
    }

    function it_should_remove_a_question()
    {
        $this->remove($this->removablequestion)->shouldReturn(true);
    }

    function it_should_have_multiple_questions()
    {
        $this->getQuestions()->shouldHaveCount(3);
    }

    function it_should_extract_one_question()
    {
        $key = 2;
        $this->getQuestion($key)->shouldReturnAnInstanceOf('Davidino\DomainBundle\Model\Question');
    }

    function it_should_add_a_question(Question $question)
    {

        $this->add($question)->shouldReturn(true);
    }

    function it_should_give_the_next_question()
    {
        $this->getNextQuestion()->shouldReturnAnInstanceOf('Davidino\DomainBundle\Model\Question');

    }

    function it_should_handle_no_more_questions()
    {
        $this->getNextQuestion();
        $this->getNextQuestion();

        $this->getNextQuestion()->shouldReturn(false);
    }
}
