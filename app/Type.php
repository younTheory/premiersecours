<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['nom'];
    public function etape()
    {
        return $this->hasMany('App\Etape','id','types_id');
    }
}
