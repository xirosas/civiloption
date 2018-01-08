<?php

namespace CivilOption;

use Illuminate\Database\Eloquent\Model;

class Coordinador extends Model
{
    protected $table = 'coordinador';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
    	'cedula','nombre','apellido','direccion','telefono',
    ];

    protected $hidden =[
    	'estado', 'id',
    ];
}
