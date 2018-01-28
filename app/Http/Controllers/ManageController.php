<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;

class ManageController extends Controller
{
   	public function checkCedulaVotante(Request $request){
	    $id = $request->input('cedula');

	    dd($isExists = DB::table('votante')->where('cedula','=',$id)->first());

	    if($isExists){
	        return response()->json(array("exists" => true));
	    }else{
	        return response()->json(array("exists" => false));
	    }
	}

	public function checkCedulaLider(Request $request){
	    $id = $request->input('cedula');

	    $isExists = DB::table('lider')->where('cedula','=',$id)->first();

	    if($isExists){
	        return response()->json(array("exists" => true));
	    }else{
	        return response()->json(array("exists" => false));
	    }
	}

	public function checkCedulaCoordinador(Request $request){
	    $id = $request->input('cedula');

	    $isExists = DB::table('lider')->where('cedula','=',$id)->first();

	    if($isExists){
	        return response()->json(array("exists" => true));
	    }else{
	        return response()->json(array("exists" => false));
	    }
	}
}
