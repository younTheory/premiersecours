<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    public function etape()
    {
        return $this->belongsTo('App\Etape');
    }
}
