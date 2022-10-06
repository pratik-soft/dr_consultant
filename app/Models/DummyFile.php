<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dummy;

class DummyFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'dummy_id', 'name'
    ];

    public function dummy()
    {
        return $this->belongsTo(Dummy::class);
    }
}
