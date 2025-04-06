<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissariatsCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'image'
    ];
}
