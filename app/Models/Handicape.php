<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handicape extends Model
{
    use HasFactory;

    protected $fillable = [
        'com_id',
        'qua_id',
        'matricule',
        'nom',
        'anneeNais',
        'sexe',
        'lieuNais',
        'cni',
        'ci',
        'type_id',
        'occupation',
        'niveau',
        'formation',
        'besoin',
        'telephone',
        'acteur_id',
        'detail',
        'seuil',
        'siCni',
        'siCniv',
        'siActe',
        'acteNais',
        'situation',
        'polyhandicap',
        'scolaire',
        'user_id',
        'groupe_id',
        'slug',
        'image',
        'com_slug',
        'qua_slug',
        'type_slug'
    ];

    public function commune()
    {
        return $this->belongsTo('App\Models\Commune','com_id');
    }

    public function quartier()
    {
        return $this->belongsTo('App\Models\Quartier','qua_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function groupe()
    {
        return $this->belongsTo('App\Models\Groupe','groupe_id');
    }

    public function acteur()
    {
        return $this->belongsTo('App\Models\Acteur','acteur_id');
    }
}
