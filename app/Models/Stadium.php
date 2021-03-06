<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use HasFactory;
    protected $table = "stadiums";

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

}
