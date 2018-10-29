<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAyuda extends Model
{
    protected $table = 'tipo_ayudas';
    public $timestamps = true;

    public function  userAyuda(){
        return $this->hasMany('App\ayuda', 'id_tipoayuda');
    }
}
