<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserAgent extends Model
{
    use HasFactory;

    protected $fillable = ['user_agent'];

    public function requests(): HasMany
    {
        return $this->hasMany(AppRequest::class);
    }
}
