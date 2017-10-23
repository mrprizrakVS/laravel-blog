<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $table = 'posts';
   protected $fillable  = ['title', 'short_text', 'full_text', 'author', 'active'];
   
        protected $casts = [
            'title'      => 'string',
            'short_text' => 'string',
            'full_text'  => 'string',
            'author'     => 'string',
            'active'     => 'integer',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
        
        protected $dates = [
             'created_at',
             'updated_at'
        ];
}
