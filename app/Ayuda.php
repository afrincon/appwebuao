<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //Borrado Logico

class Ayuda extends Model
{
    use SoftDeletes; //Implementacion del borrado logico

    protected $table = 'ayudas';
    public $timestamps = true;
    protected $fillable = array('fecha_ayuda','id_tipoayuda', 'id_beneficiario', 'id_iglesia', 'observaciones');
    protected $primaryKey = "id_ayuda";
    protected $dates = ['deleted_at']; //Registramos la nueva columna de borrado logico

    public function iglesia(){
        return $this->hasOne('App\Iglesia', 'id', 'id_iglesia');
    }
    public function beneficiario(){
        return $this->hasOne('App\Beneficiario', 'id_beneficiario', 'id_beneficiario');
    }
    public function tipoAyuda(){
        return $this->hasOne('App\TipoAyuda', 'id', 'id_tipoayuda');
    }
}
