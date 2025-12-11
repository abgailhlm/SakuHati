<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'target_amount',
        'collected_amount',
        'deadline',
        'is_active',
        'thumbnail',
        'image',
        'destination_location',
    ];
}
