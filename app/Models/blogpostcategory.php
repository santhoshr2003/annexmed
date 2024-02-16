<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogpostcategory extends Model
{
    use HasFactory;

    protected $table = 'blog_post_categories';
    protected $fillable =([
         'blog_post_id',
         'category_id',
    ]);
}
