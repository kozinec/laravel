<?php

namespace App\Mail;

use App\Models\Blog;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BlogCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Blog
     */
    public $blog;

    /**
     * Create a new message instance.
     *
     * @param  Blog  $blog
     */
    public function __construct(Blog $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('New blog page created')
            ->markdown('mail.blog.created');
    }
}
