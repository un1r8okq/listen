<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppRequest extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'url'];

    public function userAgent(): BelongsTo
    {
        return $this->belongsTo(UserAgent::class);
    }
}
