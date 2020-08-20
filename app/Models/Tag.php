<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }
}
