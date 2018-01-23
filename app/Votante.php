<?php

namespace CivilOption;

use Illuminate\Database\Eloquent\Model;

class Votante extends Model
{
    protected $table = 'votante';

    protected $primaryKey='id';

    public $timestamps=true;

    protected $fillable=[
    	'cedula','nombre','apellido','id_puesto','telefono','id_lider', 'id_user','estado',
    ];

    protected $hidden =[
    	 'id',
    ];
}
