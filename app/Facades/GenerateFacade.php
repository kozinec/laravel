<?php

declare(strict_types=1);

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generate()
 *
 * @see \App\Services\Generator
 */
class GenerateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'my-gen';
    }
}
