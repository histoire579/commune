<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = ['titre'];

    public function handicapes()
    {
        return $this->hasMany('App\Models\Handicape');
    }
}
