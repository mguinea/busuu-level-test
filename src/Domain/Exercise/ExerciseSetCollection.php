<?php

declare(strict_types=1);

namespace Busuu\Domain\Exercise;

final class ExerciseSetCollection
{
    private array $items;

    /**
     * @param ExerciseSet[] $items
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Static factory; create sets of ExerciseSet::EXERCISES_AMOUNT exercises. Ignore set if exercises are lower than 3.
     *
     * @param Exercise[] $exercises
     * @return static
     */
    public static function fromExercises(array $exercises): self
    {
        $exerciseSets = [];
        $setsAmount = self::calculateAmountOfCompleteSets($exercises);

        for($i = 0; $i < $setsAmount; ++$i) {
            $setOfExercises = array_slice(
                $exercises,
                $i * ExerciseSet::EXERCISES_AMOUNT,
                ExerciseSet::EXERCISES_AMOUNT
            );

            $exerciseSets[] = new ExerciseSet($setOfExercises);
        }

        return new self($exerciseSets);
    }

    private static function calculateAmountOfCompleteSets(array $exercises): int
    {
        return intval(floor(count($exercises) / ExerciseSet::EXERCISES_AMOUNT));
    }

    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return count($this->items);
    }

    public function slice($length): self
    {
        return new self(array_slice($this->items(), 0, $length));
    }

    public function consecutive(int $maxConsecutive): self
    {
        $toEvaluate = [];
        $previousPoints = null;
        $consecutivePoints = 0;

        foreach($this->items() as $exerciseSet) {
            $points = $exerciseSet->points();

            if ($previousPoints === $points) {
                ++$consecutivePoints;
            }

            if ($consecutivePoints < $maxConsecutive) {
                $toEvaluate[] = $exerciseSet;
            }

            $previousPoints = $points;
        }

        return new self($toEvaluate);
    }
}
