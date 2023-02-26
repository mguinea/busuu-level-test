<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

final class LevelAssessmentGoDownOneLevelUpdater implements LevelAssessmentLevelUpdaterInterface
{
    public function points(): int
    {
        return 0;
    }

    public function levels(): int
    {
        return -1;
    }
}
