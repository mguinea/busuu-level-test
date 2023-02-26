<?php

declare(strict_types=1);

namespace Busuu\Tests\unit\Domain\Shared;

trait RandomBoolTrait
{
    public static function randBool(): bool
    {
        return rand(1, 2) === 1;
    }
}
