<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttractionCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image'];

    // Relation avec AttractionService
    public function services()
    {
        return $this->hasMany(AttractionService::class, 'category_id');
    }

}
