<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposDocumento extends Model
{
    protected $table = 'tipo_documentos';

    public function beneficiarios() {
        return $this->belongsTo('App\beneficiario');
    }
}
