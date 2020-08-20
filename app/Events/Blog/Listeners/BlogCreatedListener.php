<?php

declare(strict_types=1);

namespace App\Events\Blog\Listeners;

use App\Events\Blog\BlogCreatedEvent;

class BlogCreatedListener
{
    public function handle(BlogCreatedEvent $event)
    {
        $blog = $event->getBlog();

        // НЕ ДЕЛАТЬ ТАК!
        // $blog->title .= '-'.Str::random();
        // $blog->save();
    }
}
