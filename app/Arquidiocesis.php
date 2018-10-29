<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquidiocesis extends Model
{
    protected $table = 'arquidiocesis';
    public $timestamps = true;

    // Relacion a la tabla iglesias
    public function  iglesia(){
        return $this->hasOne('App\Iglesia');
    }
}
