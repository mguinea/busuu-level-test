<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\LevelAssessment;

use Busuu\Domain\LevelAssessment\LevelAssessmentGoDownOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpTwoLevelsUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentStaysAtLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentUpdaterFactory;
use Exception;
use PHPUnit\Framework\TestCase;

final class LevelAssessmentUpdaterFactoryTest extends TestCase
{
    /**
     * @dataProvider providePointsAndExpectedUpdater
     * @param int $points
     * @param string $expected
     * @return void
     * @throws Exception
     */
    public function testItShouldMakeProperUpdater(int $points, string $expected): void
    {
        $factory = new LevelAssessmentUpdaterFactory();

        $this->assertInstanceOf($expected, $factory->make($points));
    }

    public function providePointsAndExpectedUpdater(): array
    {
        return [
            [0, LevelAssessmentGoDownOneLevelUpdater::class],
            [1, LevelAssessmentStaysAtLevelUpdater::class],
            [2, LevelAssessmentGoUpOneLevelUpdater::class],
            [3, LevelAssessmentGoUpTwoLevelsUpdater::class],
        ];
    }

    public function testItShouldThrowNotFoundException(): void
    {
        $this->expectException(Exception::class);

        $factory = new LevelAssessmentUpdaterFactory();
        $factory->make(4);
    }
}
