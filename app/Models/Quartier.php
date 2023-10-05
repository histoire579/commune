<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier extends Model
{
    use HasFactory;

    protected $fillable = ['nom','slug','com_id'];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune','com_id');
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
