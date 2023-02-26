<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\LevelAssessment;

use Busuu\Domain\LevelAssessment\LevelAssessmentGoDownOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpTwoLevelsUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentStaysAtLevelUpdater;
use PHPUnit\Framework\TestCase;

final class LevelAssessmentLevelUpdatersTest extends TestCase
{
    public function testItShouldGoDownOneLevel(): void
    {
        $updater = new LevelAssessmentGoDownOneLevelUpdater();

        $this->assertEquals(0, $updater->points());
        $this->assertEquals(-1, $updater->levels());
    }

    public function testItShouldGoUpOneLevel(): void
    {
        $updater = new LevelAssessmentGoUpOneLevelUpdater();

        $this->assertEquals(2, $updater->points());
        $this->assertEquals(1, $updater->levels());
    }

    public function testItShouldGoUpTwoLevels(): void
    {
        $updater = new LevelAssessmentGoUpTwoLevelsUpdater();

        $this->assertEquals(3, $updater->points());
        $this->assertEquals(2, $updater->levels());
    }

    public function testItShouldStayAtLevel(): void
    {
        $updater = new LevelAssessmentStaysAtLevelUpdater();

        $this->assertEquals(1, $updater->points());
        $this->assertEquals(0, $updater->levels());
    }
}
