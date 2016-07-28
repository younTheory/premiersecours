<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    protected $fillable = ['nom', 'nb_etape', 'pts_max'];


    public function etape()
    {
        return $this->hasMany('App\Etape');
    }

    public function score()
    {
        return $this->belongsToMany('App\Score');
    }

    public function Acces()
    {
        return $this->belongsToMany('App\Acces');
    }

    public function scopeAccesCours($query)
    {
        return $query;
    }

    public function scopeMaxPoints($query)
    {
        return $query->get()->sum('pts_max');
    }
}
