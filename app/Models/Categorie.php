<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable = ['titre','titre_en' ,'image','slug'];

    public function images()
    {
        return $this->hasMany('App\Models\Picture');
    }
}
