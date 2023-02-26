<?php

namespace Busuu\Tests\unit\Infrastructure\Shared;

use Busuu\Infrastructure\LevelAssessment\League\LevelAssessmentServiceProvider;
use League\Container\Container;
use Psr\Container\ContainerInterface;

trait WithContainerTrait
{
    public function container(): ContainerInterface
    {
        $container = new Container();
        $container->addServiceProvider(new LevelAssessmentServiceProvider());

        return $container;
    }
}
