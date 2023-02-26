<?php

namespace Busuu\Domain\LevelAssessment;

interface LevelAssessmentLevelUpdaterInterface
{
    public function points(): int;

    public function levels(): int;
}
