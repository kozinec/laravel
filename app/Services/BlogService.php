<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class BlogService
{
    public function create(array $attributes): Blog
    {
        $attributes['user_id'] = Auth::user()->id;
        $attributes['status'] = true;

        $model = Blog::create($attributes);

        return $model;
    }
}
