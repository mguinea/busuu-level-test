<?php

declare(strict_types=1);

namespace Busuu\Domain\LevelAssessment;

use Exception;
final class LevelAssessmentUpdaterFactory
{
    private array $levelAssessmentLevelUpdaters;

    public function __construct()
    {
        // If using a Service Container in <CheckImplementationIsCorrectTest> we could
        // use Dependency Injection as I mention in this article https://dev.to/mguinea/improve-your-factories-in-symfony-4mf3
        // making this more elegant than writing directly the strategies

        $this->levelAssessmentLevelUpdaters = [
            new LevelAssessmentStaysAtLevelUpdater(),
            new LevelAssessmentGoDownOneLevelUpdater(),
            new LevelAssessmentGoUpOneLevelUpdater(),
            new LevelAssessmentGoUpTwoLevelsUpdater()
        ];
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
