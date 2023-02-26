<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\Exercise;

use Busuu\Domain\Exercise\Exercise;
use Busuu\Domain\Exercise\ExerciseSetCollection;
use PHPUnit\Framework\TestCase;

final class ExerciseSetCollectionTest extends TestCase
{
    private ExerciseSetCollection $exerciseSetCollection;
    protected function setUp(): void
    {
        $this->exerciseSetCollection = ExerciseSetCollection::fromExercises([
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
        ]);
    }

    public function testItShouldCreateCollectionFromExercises(): void
    {
        $this->assertInstanceOf(ExerciseSetCollection::class, $this->exerciseSetCollection);
    }

    public function testItShouldRemoveUncompletedSets(): void
    {
        $this->assertEquals(2, $this->exerciseSetCollection->total());
    }

    public function testItShouldSliceSetsFromBeginningWithImmutability(): void
    {
        $new = $this->exerciseSetCollection->slice(1);

        $this->assertEquals(2, $this->exerciseSetCollection->total());
        $this->assertEquals(1, $new->total());
    }

    public function testItShouldReturnNonConsecutiveWithInmutability(): void
    {
        $new = $this->exerciseSetCollection->consecutive(1);

        $this->assertEquals(2, $this->exerciseSetCollection->total());
        $this->assertEquals(1, $new->total());
    }
}
