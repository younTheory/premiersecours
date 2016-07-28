<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public $timestamps = false;
    protected $fillable = ['points', 'scenarios_id', 'users_id'];
    public function user()
    {
        return $this->hasMany('App\Users');
    }

    public function scenario()
    {
        return $this->hasMany('App\Scenario');
    }


    public function scopeScoreByUser($query, $idUser)
    {
        return $query->orderBy('scenarios_id')->where('users_id','=',  $idUser)->get();
    }

    public function scopeScore($query, $idUser, $idScenario)
    {
        return $query->where('users_id','=',  $idUser)->where('scenarios_id','=', $idScenario)->first();
    }
}
