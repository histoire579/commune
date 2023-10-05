<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appreciation extends Model
{
    use HasFactory;

    protected $fillable = ['titre','slug'];

    public function qualites()
    {
        return $this->hasMany('App\Models\Qualite');
    }
}
