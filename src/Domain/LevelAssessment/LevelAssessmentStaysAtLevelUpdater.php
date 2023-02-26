<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

final class LevelAssessmentStaysAtLevelUpdater implements LevelAssessmentLevelUpdaterInterface
{
    public function points(): int
    {
        return 1;
    }

    public function levels(): int
    {
        return 0;
    }
}
