<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;

class PdfLiderController extends Controller
{
    public function totalVotantes($id) 
    {
        $liderNum = $id;
        $data = DB::table('lider as l')
        ->join('coordinador as c','l.id_coordinador','=','c.id')
        ->select('l.telefono as telefono','l.nombre as nombre','l.apellido as apellido','l.cedula as cedula','c.nombre as nomcoor', 'c.apellido as apecoor')
        ->orderBy('c.nombre')
        ->orderBy('l.nombre')
        ->get();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view = view('pdflider.totalVotantes',[ 	
        	"data"=>$data,
            "date"=>$date,    	
            "invoice"=>$invoice
        ]);

        return $view;
    }

    public function index(Request $request){
        $query=trim($request->get('searchText'));
        $lideres = DB::table('lider as l')
        ->where('l.cedula','LIKE','%'.$query.'%')
        ->where('l.estado','!=','0')  
        ->orderBy('l.nombre','asc')
        ->orderBy('l.apellido','asc')
        ->paginate(20);
        return view('pdflider.index',[
            'lideres' => $lideres,
            "searchText"=> $query,
        ]);
    }
}
