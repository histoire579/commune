<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualite extends Model
{
    use HasFactory;

    protected $fillable = ['moyenne','moyenneAcceptable','service_id','theme_id','app_id','slug_app'];

    public function service()
    {
        return $this->belongsTo('App\Models\Service','service_id');
    }

    public function theme()
    {
        return $this->belongsTo('App\Models\Thematique','theme_id');
    }

    public function appreciation()
    {
        return $this->belongsTo('App\Models\Appreciation','app_id');
    }
}
