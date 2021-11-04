<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    // Add
    protected $fillable = [
        'name',
        'image_path',
        'author',
        'rate',
        'original_price',
        'sale_price',
        'format',
        'publisher',
        'published',
        'genre',
        'pages',
        'quantity',
        'description',
        'editor_book',
        'today_book',
        'trending_book'
    ];
}
