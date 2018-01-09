<?php

namespace CivilOption;

use Illuminate\Database\Eloquent\Model;

class Lider extends Model
{
    protected $table = 'lider';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
    	'cedula','nombre','apellido','direccion','telefono','id_coordinador',
    ];

    protected $hidden =[
    	'estado', 'id',
    ];
}
