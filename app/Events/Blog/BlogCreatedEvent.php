<?php

declare(strict_types=1);

namespace App\Events\Blog;

use App\Models\Blog;

class BlogCreatedEvent
{
    /**
     * @var Blog
     */
    private $blog;

    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * @return Blog
     */
    public function getBlog(): Blog
    {
        return $this->blog;
    }
}
