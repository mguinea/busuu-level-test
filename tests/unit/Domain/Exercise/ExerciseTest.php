<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\Exercise;

use Busuu\Domain\Exercise\Exercise;
use PHPUnit\Framework\TestCase;

final class ExerciseTest extends TestCase
{
    /**
     * @dataProvider providePassedStatus
     * @param bool $passed
     * @return void
     */
    public function testItReturnsCorrectPassedStatus(bool $passed): void
    {
        $exercise = (new Exercise())->setPassed($passed);

        $this->assertEquals($passed, $exercise->isPassed());
    }

    public function providePassedStatus(): array
    {
        return [
          [ true ],
          [ false]
        ];
    }
}
