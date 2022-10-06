<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blog;
use App\Models\Service;
use App\Models\Portfolio;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'type', 'status'
    ];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_tag');
    }

    public function portfolios()
    {
        return $this->belongsToMany(Portfolio::class, 'portfolio_tag');
    }
}
