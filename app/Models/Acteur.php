<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_id',
        'qua_id',
        'nom',
        //'domaine',
        'localisation',
        'contact',
        'capacite',
        'commodite',
        'cat_id',
        'autre',
        'user_id',
        'slug',
        'image',
        'com_slug',
        'qua_slug',
        'cat_slug',
    ];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune','com_id');
    }

    public function quartier()
    {
        return $this->belongsTo('App\Models\Quartier','qua_id');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Models\CategorieActeur','cat_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function handicapes()
    {
        return $this->hasMany('App\Models\Handicape');
    }
}
