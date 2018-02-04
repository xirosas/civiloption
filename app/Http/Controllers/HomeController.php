<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CivilOption\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

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
        $ContLider = DB::table('lider')->where('estado','!=','0')->count();
        
        $ContCoordinador = DB::table('coordinador')->where('estado','!=','0')->count();
        
        $ContTotalVotante = DB::table('votante')->count();
        
        $ContVotante = DB::table('votante')->where('estado','=','1')->count();

        $ContMoto = DB::table('votante')->where('estado','=','2')->count();

        $ContVehiculo = DB::table('votante')->where('estado','=','3')->count();
        $ContRechazos = DB::table('votante')->where('estado','=','0')->orwhere('estado','=','4')->count();
        
        if($ContTotalVotante != 0 || $ContVotante != 0){
            $porcentajeVotante = ($ContVotante*100)/$ContTotalVotante . '%';
            $porcentajeTotal = ($ContTotalVotante*100)/189719 . '%';
        }else{
            $porcentajeVotante = 0;
            $porcentajeTotal = 0;
        }
        

        $UserList = DB::table('users')->get();

        //$VotantesContadorUsuario = DB::table('votante as v')->join('users as u','v.id_user','=','u.id')->count('* as cantidad')->select()->where('estado','!=','0')->groupBy('nombre');       

        //foreach($VotantesContadorUsuario as $v){
        //    dd($v->nombre);
        //}

        //$VotantesContadorUsuario = DB::select('call VOTANTESPORDIAPORUSUARIO("2018-01-22")');

        return view('admin.index',[
            "lider"=>$ContLider,
            "coordinador"=>$ContCoordinador,
            "votante"=>$ContVotante,
            "totalVotante"=>$ContTotalVotante, 
            'porcentajeVotante'=>$porcentajeVotante,
            'porcentajeTotal'=>$porcentajeTotal, 
            'usuarios'=>$UserList,
            'moto'=>$ContMoto,
            'carro'=>$ContVehiculo,
            'rechazo'=>$ContRechazos
        ]);
    }

    //public function data(){
    //    $Dias=DB::table('votante as v')
    //    join('','','')->;
    //}

}
