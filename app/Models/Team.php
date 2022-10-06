<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Position;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'photo', 'position_id', 'status'
    ];

    protected $dates = [
        
    ];
    
    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
