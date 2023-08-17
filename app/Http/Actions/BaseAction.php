<?php

namespace App\Http\Actions;

use Support\Helper\Helper;

abstract class BaseAction
{
    /**
     * @return static
     */
    public static function cached(): self
    {
        return Helper::runtimeCache(static::class, fn () => resolve(static::class));
    }
}
