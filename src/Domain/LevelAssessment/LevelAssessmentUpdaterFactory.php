<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

use Exception;
final class LevelAssessmentUpdaterFactory
{
    private array $levelAssessmentLevelUpdaters;

    public function __construct(LevelAssessmentLevelUpdaterInterface ...$levelAssessmentLevelUpdaters)
    {
        $this->levelAssessmentLevelUpdaters = $levelAssessmentLevelUpdaters;
    }

    /**
     * @throws Exception
     */
    public function make(int $points): LevelAssessmentLevelUpdaterInterface
    {
        foreach ($this->levelAssessmentLevelUpdaters as $levelAssessmentLevelUpdater) {
            if ($points === $levelAssessmentLevelUpdater->points()) {
                return $levelAssessmentLevelUpdater;
            }
        }

        throw new Exception(sprintf('No level assessment updater found for <%d> points', $points));
    }
}
