<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;

class PdfCoordinadorController extends Controller
{
    public function totalVotantes($id) 
    {
        $liderNum = $id;
        $data = DB::table('coordinador as c')
        ->where('estado','=','1')
        ->orderBy('c.nombre')
        ->get();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view = view('pdfcoordinador.totalVotantes',[     
            "data"=>$data,
            "date"=>$date,      
            "invoice"=>$invoice
        ]);

        return $view;
    }

    public function index(Request $request){
        $query=trim($request->get('searchText'));
        $lideres = DB::table('coordinador as c')
        ->orderBy('c.nombre','asc')
        ->orderBy('c.apellido','asc')
        ->paginate(20);
        return view('pdfcoordinador.index',[
            'lideres' => $lideres,
            "searchText"=> $query,
        ]);
    }
}
