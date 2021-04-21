<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "cliente";
    protected $fillable=[
        'nombre',
        'apellido'

    ];

    public $timestamps=false;
    public function notaincripcions(){
        return $this->hasMany('App\Notainscripcion');
    }
}
