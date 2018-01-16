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
        
        $ContTotalVotante = DB::table('votante')->count();
        
        $ContVotante = DB::table('votante')->where('estado','=','1')->count();
        
        $porcentajeVotante = ($ContVotante*100)/$ContTotalVotante . '%';
        
        $porcentajeTotal = ($ContTotalVotante*100)/189719 . '%';

        $UserList = DB::table('users')->get();

        $ContUserList = DB::table('votante as v')
        ->join('users as u','v.id_user','=','u.id')
        ->select('v.id as IdVotante','u.id as IdUsuario')
        ->where('v.estado','=','1')
        ->get();

        $ContadorLeny = 0;
        $ContadorJose = 0;
        $ContadorEdwin = 0;
        $ContadorErika = 0;
        $ContadorFadys = 0;
        $ContadorJuan = 0;

        foreach($ContUserList as $Contador){
            if($Contador->IdUsuario == 1){
                $ContadorLeny = $ContadorLeny + 1;
            }
            elseif($Contador->IdUsuario == 2){
                $ContadorJose = $ContadorJose + 1;
            }
            elseif($Contador->IdUsuario == 3){
                $ContadorEdwin = $ContadorEdwin + 1;
            }
            elseif($Contador->IdUsuario == 4){
                $ContadorErika = $ContadorErika + 1;
            }
            elseif($Contador->IdUsuario == 6){
                $ContadorFadys = $ContadorFadys + 1;
            }
            elseif($Contador->IdUsuario == 7){
                $ContadorJuan = $ContadorJuan + 1;
            }
        }  

        $Contadores =[
            'Leny'=>$ContadorLeny,
            'Jose'=>$ContadorJose,
            'Edwin'=>$ContadorEdwin,
            'Erika'=>$ContadorErika,
            'Fadys'=>$ContadorFadys,
            'Juan'=>$ContadorJuan,
        ];

        //dd($ContadorJose.'-'. $ContadorLeny.'-'. $ContadorEdwin.'-'. $ContadorErika.'-'. $ContadorFadys.'-'. $ContadorJuan);

        dd($Contadores);
        return view('admin.index',[
            "lider"=>$ContLider,
            "coordinador"=>$ContCoordinador,
            "votante"=>$ContVotante,
            "totalVotante"=>$ContTotalVotante, 
            'porcentajeVotante'=>$porcentajeVotante,
            'porcentajeTotal'=>$porcentajeTotal, 
            'usuarios'=>$UserList, 
            'listaUsuarios' => $Contadores
        ]);
    }

    private function data(){

    }

}
