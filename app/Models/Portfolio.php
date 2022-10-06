<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;
use App\Models\Tag;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'detail', 'image', 'category_id', 'status', 'featured'
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
        return $this->belongsToMany(Tag::class, 'portfolio_tag');
    }
}
