<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistique extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'score', 'scenario_id', 'cours_id'
    ];
    public function scopeScore($query, $cours_id, $scenario_id)
    {
        return $query->where('cours_id','=', $cours_id)->where('scenario_id','=', $scenario_id);
    }
}
