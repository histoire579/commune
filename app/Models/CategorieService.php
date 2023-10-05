<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorieService extends Model
{
    use HasFactory;

    protected $fillable = ['titre','slug'];

    public function services()
    {
        return $this->hasMany('App\Models\Service');
    }
}
