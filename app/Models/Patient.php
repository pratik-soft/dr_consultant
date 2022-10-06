<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Position;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email','contact_number','password', 'status'
    ];

    protected $dates = [];

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
