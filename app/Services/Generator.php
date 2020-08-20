<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

class Generator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        return Str::random(50);
    }
}
