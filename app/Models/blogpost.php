<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogpost extends Model
{
    use HasFactory;
     protected $table ='blog_posts';
     protected $dates = ['publication_date'];
    protected $fillable=([
        'title',
        'content',
        'publication_date',
    ]);

    public function categories()
{
    return $this->belongsToMany(Category::class, 'blog_post_categories', 'blog_post_id', 'category_id');
}

}
