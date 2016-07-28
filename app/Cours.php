<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $fillable = [
        'nom', 'etat_cours_id', 'users_id', 'invites_id'
    ];
    public function etat()
    {
        return $this->belongsTo('App\EtatCours', 'etat_cours_id','id');
    }

    public function invite()
    {
        return $this->belongsTo('App\Invite', 'invites_id','id');
    }

    public function scenario()
    {
        return $this->belongsToMany('App\Scenario','cours_scenario' )->withPivot('active');
    }
    public function scenarioActive()
    {
        return $this->belongsToMany('App\Scenario','cours_scenario' )->withPivot('active')->wherePivot('active', '=', '1');
    }


    public function scopeCoursInvite($query, $invites_id){
        return $query->where('invites_id','=', $invites_id)->first();
    }
    public function scopeCours($query, $user_id)
    {
        return $query->where('users_id','=', $user_id)->get();
    }
}
