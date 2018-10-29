<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';
    public $timestamps = true;
    protected $primaryKey = 'id_beneficiario';

    protected $fillable = array('documento', 'id_tipo_documento', 'nombre', 'estado', 'direccion', 'clasificacion', 'telefono');

    public function tipo_documento(){
        return $this->hasOne('App\TiposDocumento', 'id', 'id_tipo_documento');
    }

    /* Relacion tabla ayudas */
    public function ayudas(){
        return $this->belongsTo('App\ayuda');
    }
}
