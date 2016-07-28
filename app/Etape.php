<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    public function scenario()
    {
        return $this->belongsTo('App\Scenario');
    }

    public function image()
    {
        return $this->belongsToMany('App\Image','etape_image' )->withPivot('modification');
    }

    public function reponse()
    {
        return $this->hasMany('App\Reponse');
    }

    public function typeEtape()
    {
        return $this->belongsTo('App\Type', 'types_id','id');
    }
    // retourne le nombre de points
    public function scopePoints($query, $no_etape, $scenario_id)
    {
        return $query->where('no_etape','<=', $no_etape)->where('scenario_id','=', $scenario_id)->get();
    }

    public function scopePremiereEtape($query)
    {
        return $query->where('no_etape', 1);
    }

    public function scopePremiereEtapeByScenario($query, $id_scenario)
    {
        return $query->where('no_etape', 1)->where('scenario_id', '=', $id_scenario);
    }

    public function etapeSuivante()
    {
        return Etape::where('no_etape', '>', $this->no_etape)->where('scenario_id', '=', $this->scenario_id)->orderBy('no_etape','asc')->first();
    }
}
