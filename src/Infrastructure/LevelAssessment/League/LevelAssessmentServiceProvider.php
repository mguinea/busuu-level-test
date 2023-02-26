<?php

declare(strict_types=1);

namespace Busuu\Infrastructure\LevelAssessment\League;

use Busuu\Domain\LevelAssessment\LevelAssessment;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoDownOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpOneLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentGoUpTwoLevelsUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentService;
use Busuu\Domain\LevelAssessment\LevelAssessmentStaysAtLevelUpdater;
use Busuu\Domain\LevelAssessment\LevelAssessmentUpdaterFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;

final class LevelAssessmentServiceProvider extends AbstractServiceProvider
{
    public function provides(string $id): bool
    {
        $services = [
            LevelAssessment::class,
            LevelAssessmentUpdaterFactory::class,
            LevelAssessmentService::class
        ];

        return in_array($id, $services);
    }

    public function register(): void
    {
        $container = $this->getContainer();

        // Tag updaters
        $container->add(LevelAssessmentGoDownOneLevelUpdater::class)->addTag('gradeUpdaters');
        $container->add(LevelAssessmentGoUpOneLevelUpdater::class)->addTag('gradeUpdaters');
        $container->add(LevelAssessmentGoUpTwoLevelsUpdater::class)->addTag('gradeUpdaters');
        $container->add(LevelAssessmentStaysAtLevelUpdater::class)->addTag('gradeUpdaters');

        // Registration
        $container->add(LevelAssessmentUpdaterFactory::class)->addArguments($container->get('gradeUpdaters'));
        $container->add(LevelAssessment::class)->addArgument(LevelAssessmentUpdaterFactory::class);
        $container->add(LevelAssessmentService::class)->addArgument(LevelAssessment::class);
    }
}
