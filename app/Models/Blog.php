<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Tag;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'posted_at', 'content', 'image', 'category_id', 'status', 'featured'
    ];

    protected $dates = [
        'posted_at'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
}
