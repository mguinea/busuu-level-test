<?php


namespace Busuu\Service;


interface LevelAssessmentServiceInterface
{
    /**
     * @param array $exercises
     * @return string|bool
     */
    public function calculateLevel(array $exercises);
}