<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Models\Service;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'parent_id', 'type', 'status'
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
