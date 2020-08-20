<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $birthday
 */
class UserProfile extends Model
{
    protected $table = 'users_profile';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
    ];

    public function fistLast()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
