<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Coordinador;
Use CivilOption\Votante;
Use CivilOption\Lider;

class FiltroCoordinadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request){
    		$query = $request->get('searchText');
    		$Lider = Lider::select('*')->where('id_coordinador','=',$query)->get();
    		$Coordinadores = Coordinador::all();

            dd($contenido = file_get_contents('https://wsp.registraduria.gov.co/censo/_censoResultado.php?nCedula=1102812122&nCedulaH=&x=78&y=7'));

    		return view('filtroCoordinador.index',[
    			"searchText"=>$query,
    			"lider"=>$Lider,
    			"coordinadores"=>$Coordinadores
    		]);
    	}
    }
}
