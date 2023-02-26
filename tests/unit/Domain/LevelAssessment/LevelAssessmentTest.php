<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\LevelAssessment;

use Busuu\Domain\LevelAssessment\LevelAssessment;
use Busuu\Tests\unit\Infrastructure\Shared\WithContainerTrait;
use PHPUnit\Framework\TestCase;

final class LevelAssessmentTest extends TestCase
{
    use WithContainerTrait;

    private LevelAssessment $levelAssessment;

    protected function setUp(): void
    {
        $this->levelAssessment = $this->container()->get(LevelAssessment::class);
    }

    /**
     * @dataProvider providePointsAndExpectedLevel
     * @param array $exerciseSetsPoints
     * @param string $expected
     * @return void
     */
    public function testItShouldReturnProperGrade(array $exerciseSetsPoints, string $expected): void
    {
        foreach($exerciseSetsPoints as $points) {
            $this->levelAssessment->applyExerciseSetPoints($points);
        }

        $this->assertEquals($expected, $this->levelAssessment->grade());
    }

    public function providePointsAndExpectedLevel(): array
    {
        return [
            [[0], 'A1'],
            [[1], 'A1'],
            [[2], 'A2'],
            [[2, 2], 'B1'],
            [[3, 3], 'C1'],
            [[3, 3, 3], 'C2'],
            [[3, 3, 3], 'C2'],
        ];
    }
}
