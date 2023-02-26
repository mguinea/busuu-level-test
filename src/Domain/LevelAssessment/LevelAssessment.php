<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

final class LevelAssessment
{
    private int $gradeIndex = 0;
    private array $grades = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];

    public function applyExerciseSetPoints(int $points): void
    {
        $levelAssessmentLevelUpdater = (new LevelAssessmentUpdaterFactory())->make($points);

        $this->updateGrade($levelAssessmentLevelUpdater->levels());
    }

    private function updateGrade(int $levels): void
    {
        $this->gradeIndex += $levels;
        $this->bottomLimit();
        $this->topLimit();
    }

    private function bottomLimit(): void
    {
        if ($this->gradeIndex < 0) {
            $this->gradeIndex = 0;
        }
    }

    private function topLimit(): void
    {
        $top = count($this->grades) - 1;

        if ($this->gradeIndex > $top) {
            $this->gradeIndex = $top;
        }
    }

    public function grade(): string
    {
        return $this->grades[$this->gradeIndex];
    }
}
