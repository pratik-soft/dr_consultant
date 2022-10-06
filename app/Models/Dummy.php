<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\DummyFile;

class Dummy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid', 'name', 'description', 'content', 'image', 'difficulty', 'posted_at', 'featured', 'status'
    ];

    public function files()
    {        
        return $this->hasMany(DummyFile::class);
    }
}
