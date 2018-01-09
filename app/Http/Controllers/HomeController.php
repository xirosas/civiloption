<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CivilOption\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ContLider = DB::table('lider')->where('estado','=','1')->count();
        $ContCoordinador = DB::table('coordinador')->where('estado','=','1')->count();
        $ContVotante = DB::table('votante')->where('estado','=','1')->count();
        return view('admin.index',["lider"=>$ContLider,"coordinador"=>$ContCoordinador,"votante"=>$ContVotante ]);
    }

}
