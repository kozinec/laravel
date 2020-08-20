<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property boolean $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property User $user
 * @property Tag[] $tags
 */
class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = [
        'title',
        'description',
        'user_id',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

//    public function resolveRouteBinding($value, $field = null)
//    {
//        dd($field);
//        return $this
//            ->where('id', $value)
//            ->where('status', '=', true)
//            ->firstOrFail();
//    }

    public function shortDescription(int $limit = 100): string
    {
        return Str::limit($this->description, $limit);
    }

    public function user(): HasOne
    {
//        return $this->hasOne(User::class, 'id', 'user_id');
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
