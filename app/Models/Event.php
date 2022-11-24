<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'type',
        'date',
        'description',

        'slug',
        'image_path',
        'short_description',
        'start_time',
        'end_time'
    ];

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
