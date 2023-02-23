<?php


use Busuu\Entity\Exercise;
use Busuu\Service\LevelAssessmentService;
use PHPUnit\Framework\TestCase;

/**
 * !!!!!!
 * Do not make changes to this class - if you need to add more unit tests, create a new class
 * !!!!!!
 */
class CheckImplementationIsCorrectTest extends TestCase
{
    /**
     * Not enough exercises to evaluate the user
     */
    public function testEvaluationNotComplete()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSet1());

        $this->assertFalse($result);
    }

    /**
     * Given the results, user should be graded "A2"
     */
    public function testEvaluationCompleteLevelA2()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSet2());

        $this->assertEquals('A2', $result);
    }

    /**
     * Given the results, user should be graded "C2"
     */
    public function testEvaluationCompleteLevelC2()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSet3());

        $this->assertEquals('C2', $result);
    }

    /**
     * Given the results, user should be graded "A1"
     */
    public function testEvaluationCompleteLevelA1()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSet4());

        $this->assertEquals('A1', $result);
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSet1(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSet2(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSet3(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSet4(): array
    {
        return [
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
        ];
    }
}