<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
	protected $table='modulos';
	protected $fillable=[];

    public function usuarios(){
    	return $this->belongsToMany('\App\User', 'permisos')
    	->withPivot('c','r','u','d','s','excel','pdf','correos','s4');
    }
}
