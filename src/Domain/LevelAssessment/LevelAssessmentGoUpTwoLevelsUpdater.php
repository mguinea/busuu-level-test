<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

final class LevelAssessmentGoUpTwoLevelsUpdater implements LevelAssessmentLevelUpdaterInterface
{
    public function points(): int
    {
        return 3;
    }

    public function levels(): int
    {
        return 2;
    }
}
