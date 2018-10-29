<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    protected $table = 'beneficiarios';
    public $timestamps = true;
    protected $primaryKey = 'id_beneficiario';

    public function tipo_documento(){
        return $this->hasOne('App\TiposDocumento', 'id', 'id_tipo_documento');
    }
}
