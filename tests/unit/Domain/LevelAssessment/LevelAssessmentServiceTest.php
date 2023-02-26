<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\LevelAssessment;

use Busuu\Domain\Exercise\Exercise;
use Busuu\Domain\LevelAssessment\LevelAssessmentService;
use Busuu\Tests\unit\Infrastructure\Shared\WithContainerTrait;
use PHPUnit\Framework\TestCase;

final class LevelAssessmentServiceTest extends TestCase
{
    use WithContainerTrait;

    private LevelAssessmentService $levelAssessmentService;

    protected function setUp(): void
    {
        $this->levelAssessmentService = $this->container()->get(LevelAssessmentService::class);
    }

    /**
     * @dataProvider provideResults
     * @param array $results
     * @param string $expected
     * @return void
     */
    public function testItShouldCalculateCorrectGrade(array $results, string $expected): void
    {
        $exercises = array_map(fn($passed) => $this->toExercise($passed), $results);
        $this->assertEquals($expected, $this->levelAssessmentService->calculateLevel($exercises));
    }

    private function toExercise(bool $passed): Exercise
    {
        return (new Exercise())->setPassed($passed);
    }

    public function provideResults(): array
    {
        return [
            [ [true, false, false, false, false, false], 'A1' ],
            [ [true, true, false, true, false, false], 'A2' ],
            [ [true, true, true, true, false, false], 'B1' ],
            [ [true, true, true, true, true, false], 'B2' ],
            [ [true, true, true, true, true, true], 'C1' ],
            [ [true, true, true, true, true, true, true, true, false], 'C2' ],
        ];
    }
}
