<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\Exercise;

use Busuu\Domain\Exercise\Exercise;
use Busuu\Domain\Exercise\ExerciseSet;
use PHPUnit\Framework\TestCase;

final class ExerciseSetTest extends TestCase
{
    /**
     * @dataProvider provideExercises
     * @param array $exercisesPasses
     * @param int $expected
     * @return void
     */
    public function testItShouldCalculateExercisePoints(array $exercisesPasses, int $expected): void
    {
        $exerciseSet = new ExerciseSet([
            (new Exercise())->setPassed($exercisesPasses[0]),
            (new Exercise())->setPassed($exercisesPasses[1]),
            (new Exercise())->setPassed($exercisesPasses[2])
        ]);

        $this->assertEquals($expected, $exerciseSet->points());
    }

    public function provideExercises(): array
    {
        return [
            [
                [true, true, true], 3
            ],
            [
                [true, true, false], 2
            ],
            [
                [true, false, false], 1
            ],
            [
                [false, false, false], 0
            ]
        ];
    }
}
