<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherReport extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'report' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
