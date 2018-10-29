<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    protected $table = 'iglesias';

    public $timestamps = true;
    
    protected $fillable = array('nombre', 'direccion', 'telefono', 'user_id', 'id_arquidiocesis','estado');

    /* Relacion tabla usuarios */
    public function user(){
        return $this->belongsTo('App\User');
    }

    /* relacion tabla arquidiocesis */
    public function arquidiocesis(){
        return $this->belongsTo('App\Arquidiocesis', 'id_arquidiocesis', 'id');
    }
}
