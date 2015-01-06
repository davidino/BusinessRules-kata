<?php

namespace Davidino\DomainBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Davidino\DomainBundle\Model\Question;
class Quiz
{

    /**
     * @var ArrayCollection
     */
    private $questions;

    public function __construct(array $questions)
    {
        $this->questions = new ArrayCollection($questions);
    }

    /**
     * @return ArrayCollection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * @return Question
     */
    public function getNextQuestion()
    {
        return $this->questions->next();
    }

    public function getQuestion($key)
    {
        return $this->questions->get($key);
    }

    /**
     * @param Question $question
     * @return bool
     */
    public function add(Question $question)
    {
        return $this->questions->add($question);
    }

    /**
     * @param Question $question
     * @return bool
     */
    public function remove(Question $question)
    {
        return $this->questions->removeElement($question);
    }
}
