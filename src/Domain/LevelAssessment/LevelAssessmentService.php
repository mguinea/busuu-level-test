<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

use Busuu\Domain\Exercise\ExerciseSetCollection;

final class LevelAssessmentService implements LevelAssessmentServiceInterface
{
    const MINIMUM_EXERCISE_SETS = 2;
    const MAXIMUM_EXERCISE_SETS = 5;
    const MAXIMUM_CONSECUTIVE = 2;

    /**
     * @param array $exercises
     * @return string|bool
     */
    public function calculateLevel(array $exercises)
    {
        $levelAssessment = new LevelAssessment();
        $exerciseSetCollection = ExerciseSetCollection::fromExercises($exercises);

        if ($exerciseSetCollection->total() < self::MINIMUM_EXERCISE_SETS) {
            return false;
        }

        $toEvaluateExerciseSetCollection = $exerciseSetCollection
            ->slice(self::MAXIMUM_EXERCISE_SETS)
            ->consecutive(self::MAXIMUM_CONSECUTIVE);

        foreach($toEvaluateExerciseSetCollection->items() as $toEvaluateExerciseSet) {
            $levelAssessment->applyExerciseSetPoints($toEvaluateExerciseSet->points());
        }

        return $levelAssessment->grade();
    }
}
