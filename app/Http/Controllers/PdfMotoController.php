<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;


class PdfMotoController extends Controller
{

	public function totalVotantes($id) 
    {
        $liderNum = $id;
        $data = DB::table('votante as v')
            ->join('lider as l','v.id_lider','=','l.id')
            ->join('coordinador as c','l.id_coordinador','=','c.id')
            ->join('users as u','v.id_user','=','u.id')
            ->join('barrio as b','v.id_barrio','=','b.id')
            ->join('puesto as p','v.id_puesto','=','p.id')
            ->select('v.id','v.cedula','v.nombre','v.apellido','v.telefono','l.nombre as nomlider','l.apellido as apelider','v.estado','u.name as nomusuario','u.lastname as apeusuario','b.nombre as nombarrio','p.nombrepuesto as puesto','c.nombre as nomcoor', 'c.apellido as apecoor')
            ->where('v.estado','=','2')
            ->orderBy('c.nombre','asc')
            ->orderBy('l.nombre','asc')
            ->orderBy('v.nombre','asc')
            ->get();
        $dataLider = DB::table('lider')->where('id','=',$liderNum)->first();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view = view('pdfmoto.totalVotantes',[ 	
        	"data"=>$data,
            "date"=>$date,    	
            "invoice"=>$invoice,
            "lider"=>(is_null($dataLider)) ? 'No se encuentra' : $dataLider,

        ]);
        return $view;
    }

    public function index(Request $request){
        $query=trim($request->get('searchText'));
        $lideres = DB::table('lider as l')
        ->orderBy('l.nombre','asc')
        ->orderBy('l.apellido','asc')
        ->paginate(20);
        $lideresMoto = DB::table('votante as v')
        ->join('lider as l','v.id_lider','=','l.id')
        ->select('l.nombre as Nombre','l.apellido as Apellido' ,DB::raw('count(*) as Cantidad'))
        ->where('v.estado','=','3')
        ->groupBy('l.nombre', 'l.apellido');

        return view('pdfmoto.index',[
            'lideres' => $lideres,
            "searchText"=> $query,
        ]);
    }
}