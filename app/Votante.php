<?php

namespace CivilOption;

use Illuminate\Database\Eloquent\Model;

class Votante extends Model
{
    protected $table = 'votante';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
    	'cedula','nombre','apellido','direccion','telefono','id_lider', 'id_user',
    ];

    protected $hidden =[
    	'estado', 'id',
    ];
}
