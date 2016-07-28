<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active', 'role_id'
    ];
    protected $score = 0;

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($value)
    {
        $this->score = $value;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeUtilisateur($query, $user_id)
    {
        return $query->where('id','=', $user_id)->first();
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function score()
    {
        return $this->belongsToMany('App\Score');
    }

}
