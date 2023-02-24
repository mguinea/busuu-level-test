<?php

namespace Busuu\Application\LevelAssessment;

use Busuu\Domain\LevelAssessment\LevelAssessmentServiceInterface;

class LevelAssessmentService implements LevelAssessmentServiceInterface
{
    /**
     * @param array $exercises
     * @return string|bool
     */
    public function calculateLevel(array $exercises)
    {
        return '';
    }
}
