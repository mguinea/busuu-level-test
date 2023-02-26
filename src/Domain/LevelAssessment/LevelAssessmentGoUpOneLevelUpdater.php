<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

final class LevelAssessmentGoUpOneLevelUpdater implements LevelAssessmentLevelUpdaterInterface
{
    public function points(): int
    {
        return 2;
    }

    public function levels(): int
    {
        return 1;
    }
}
