<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Position;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'photo', 'review', 'position_id', 'status'
    ];

    protected $dates = [
        
    ];
    
    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
