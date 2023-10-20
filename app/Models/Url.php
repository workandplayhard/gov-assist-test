<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $appends = ['shortened_url'];

    protected $guarded = ['created_at', 'updated_at'];

    protected $fillable = [
        'destination',
        'slug'
    ];

    public function getShortenedUrlAttribute()
    {
        return DEFAULT_URL . $this->slug;
    }
}
