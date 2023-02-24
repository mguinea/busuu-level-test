<?php


namespace Busuu\Domain\LevelAssessment;


interface LevelAssessmentServiceInterface
{
    /**
     * @param array $exercises
     * @return string|bool
     */
    public function calculateLevel(array $exercises);
}
