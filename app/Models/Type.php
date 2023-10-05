<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['titre','slug'];

    public function handicapes()
    {
        return $this->hasMany('App\Models\Handicape');
    }
}
