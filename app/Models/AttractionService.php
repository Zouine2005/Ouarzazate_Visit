<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionService extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'address',
        'latitude',
        'longitude',
        'video',
        'photos',
        'rating',
       
    ];

    protected $casts = [
        'photos' => 'array', // Convertit JSON en tableau PHP
    ];

  // Relation avec AttractionCategory
    public function category()
    {
        return $this->belongsTo(AttractionCategory::class, 'category_id');
    }
}
