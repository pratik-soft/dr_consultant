<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Team;
use App\Models\Testimonial;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'status'
    ];

    public function teams()
    {
        return $this->belongsTo(Team::class, 'position_id', 'id');
    }

    public function testimonials()
    {
        return $this->belongsTo(Testimonial::class, 'position_id', 'id');
    }
}
