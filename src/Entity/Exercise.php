<?php

namespace Busuu\Entity;


class Exercise
{
    /**
     * @var bool
     */
    private $passed;

    /**
     * Whether the user successfully passed the exercise
     *
     * @return bool
     */
    public function isPassed(): bool
    {
        return $this->passed;
    }

    /**
     * @param bool $passed
     * @return Exercise
     */
    public function setPassed(bool $passed): Exercise
    {
        $this->passed = $passed;

        return $this;
    }
}