<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursScenario extends Model
{
    public $table = "cours_scenario";
    public $timestamps = false;
    protected $primaryKey = null;

    protected $fillable = [
        'active', 'scenario_id', 'cours_id'
    ];

    public function scopeAcces($query, $cours_id,$scenario_id ){
        return $query->where('cours_id','=', $cours_id)->where('scenario_id','=', $scenario_id)->first();
    }
}
