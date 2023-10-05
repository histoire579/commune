<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;

    protected $fillable = ['nom','slug'];

    public function quartiers()
    {
        return $this->hasMany('App\Models\Quartier');
    }

    public function handicapes()
    {
        return $this->hasMany('App\Models\Handicape');
    }

    public function acteurs()
    {
        return $this->hasMany('App\Models\Acteur');
    }

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
