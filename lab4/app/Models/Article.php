<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory;

        protected $fillable = [
        'date',
        'title',
        'short_description',
        'description',
        'preview_image',
        'full_image',
    ];

    protected function casts(): array
            {
                return [
                    'date' => 'date',
                ];
            }
}
