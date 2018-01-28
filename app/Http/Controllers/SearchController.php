<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use CivilOption\Http\Controllers\Controller;
use CivilOption\Votante;
use CivilOption\Lider;
use CivilOption\Coordinador;


class SearchController extends Controller
{
    public function search(){
        return view('search');
    }

    public function autocomplete(Request $request){
        $data = Votante::select("cedula as numer")->where("numer","=",$request->input('query'))->get();
        return response()->json($data);
    }
}
