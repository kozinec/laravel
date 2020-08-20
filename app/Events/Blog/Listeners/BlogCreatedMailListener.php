<?php

declare(strict_types=1);

namespace App\Events\Blog\Listeners;

use App\Events\Blog\BlogCreatedEvent;
use App\Mail\BlogCreated;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Auth;

class BlogCreatedMailListener
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(BlogCreatedEvent $event)
    {
        $blog = $event->getBlog();

        if (!$blog->status) {
            // Sorry $$$$$
            $message = new BlogCreated($blog);
        } elseif ($blog->created_at < Carbon::now()->addDays(7)) {
            // all good
            $message = new BlogCreated($blog);
        }

        /** @var User $user */
        $user = Auth::user();

        if ($message) {
            $this->mailer->to($user->email)->send($message);
        }

//        return false;
    }
}
