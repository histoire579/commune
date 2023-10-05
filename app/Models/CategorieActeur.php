<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieActeur extends Model
{
    use HasFactory;

    protected $fillable = ['titre','slug'];

    public function ateurs()
    {
        return $this->hasMany('App\Models\Acteur');
    }
}
