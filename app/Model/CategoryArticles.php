<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryArticles extends Model
{
    protected $table = 'category_articles';
    protected $fillable = ['category_id', 'article_id'];
    
    protected $casts = [
        'category_id'   => 'integer',
        'article_id'    => 'integer'
    ];
}
