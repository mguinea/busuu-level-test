<?php

declare(strict_types=1);

namespace Busuu\Domain\Exercise;

final class ExerciseSet
{
    const EXERCISES_AMOUNT = 3;
    private int $points;

    /**
     * @param Exercise[] $exercises
     */
    public function __construct(array $exercises)
    {
        $this->points = $this->calculatePoints($exercises);
    }

    private function calculatePoints(array $exercises): int
    {
        $points = array_map(function(Exercise $exercise) {
            return $exercise->isPassed() ? 1 : 0;
        }, $exercises);

        return array_sum($points);
    }

    public function points(): int
    {
        return $this->points;
    }
}
