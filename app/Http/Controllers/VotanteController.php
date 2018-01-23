<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
use CivilOption\Http\Requests\VotanteFormRequest;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;
use Validator;

class VotanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$votantes=DB::table('votante as v')
            ->join('lider as l','v.id_lider','=','l.id')
            ->join('users as u','v.id_user','=','u.id')
            ->join('barrio as b','v.id_barrio','=','b.id')
            ->join('puesto as p','v.id_puesto','=','p.id')
            ->select('v.id','v.cedula','v.nombre','v.apellido','v.telefono','l.nombre as nomlider','l.apellido as apelider','v.estado','u.name as nomusuario','u.lastname as apeusuario','b.nombre as nombarrio','p.nombrepuesto as puesto')
            ->where('v.estado','!=','0')
            ->where('v.cedula','LIKE','%'.$query.'%')  
            ->orwhere('v.nombre','LIKE','%'.$query.'%')
    		->orderBy('v.cedula','asc')
    		->paginate(15);
    		$count = DB::table('votante')->where('estado','!=','0')->count();
    		return view('votante.index',["votantes"=>$votantes,"searchText"=>$query,"contador"=>$count]);
    	}
    }

     public function create(){
     	$count = DB::table('votante')->where('estado','=','1')->count();
        $lideres=DB::table('lider')->where('estado','=','1')->orderBy('nombre','asc')->get();
        $barrios=DB::table('barrio')->orderBy('nombre','asc')->get();
        $puestos=DB::table('puesto')->orderBy('nombrepuesto','asc')->get();

    	return view('votante.create',["contador"=>$count,"lideres"=>$lideres,"barrios"=>$barrios,"puestos"=>$puestos]);
    }

    private function message(VotanteFormRequest $request){
        $result = DB::table('votante as v')
                  ->join('lider as l','v.id_lider','=','l.id')
                  ->select('l.nombre as nombre','l.apellido as apellido','l.cedula as cedula')
                  ->where('v.cedula','=',$request->get('cedula'))
                  ->first();
        return 'Esta cedula '.$request->get('cedula').' esta siendo usada por el lider '. $result->nombre .' '. $result->apellido .' - '.$result->cedula .'.';
    }

    public function store (VotanteFormRequest $request){ 
        
        $message = message($request);




    	$validator = Validator::make($request->all(), [
            'cedula' => 'required|unique:votante',
        ],[ 
            'cedula.unique'=> trim($message) != '' ? $message : 'Esta cedula está duplicada',
        ]);
        if ($validator->fails()) {
            return redirect('votante/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $votante1=new votante;
    	$votante1->cedula=$request->get('cedula');
    	$votante1->nombre=$request->get('nombre');
    	$votante1->apellido=$request->get('apellido');
    	$votante1->id_puesto=$request->get('id_puesto');
        $votante1->id_barrio=$request->get('id_barrio');
    	$votante1->telefono=$request->get('telefono');
    	$votante1->id_lider=$request->get('id_lider');
    	$votante1->id_user=$request->get('id_user');
        $votante1->estado=$request->get('estado');
    	$votante1->save();

        $count = DB::table('votante')->where('estado','=','1')->count();
        $lideres=DB::table('lider')->where('estado','=','1')->orderBy('nombre','asc')->get();
        $barrios=DB::table('barrio')->orderBy('nombre','asc')->get();
        $puestos=DB::table('puesto')->orderBy('nombrepuesto','asc')->get();
    	return view('votante.create',[
            "contador"=>$count,
            "lideres"=>$lideres,
            "barrios"=>$barrios,
            "puestos"=>$puestos
        ]);
    }

    public function show($id){
    	return view("votante.show",["votante"=>votante::findOrFail($id)]);
    }

    public function edit($id){
        $votante=votante::findOrFail($id);
        $lideres=DB::table('lider')->where('estado','=','1')->orderBy('nombre','asc')->get();
        $barrios=DB::table('barrio')->orderBy('nombre','asc')->get();
        $puestos=DB::table('puesto')->orderBy('nombrepuesto','asc')->get();
    	$count = DB::table('votante')->where('estado','=','1')->count();
    	return view("votante.edit",["votante"=>$votante,"lideres"=>$lideres,"contador"=>$count,"barrios"=>$barrios,"puestos"=>$puestos ]);
    }

    public function update(VotanteFormRequest $request,$id){
    	$votante1=votante::findOrFail($id);
    	$votante1->cedula=$request->get('cedula');
        $votante1->nombre=$request->get('nombre');
        $votante1->apellido=$request->get('apellido');
        $votante1->id_puesto=$request->get('id_puesto');
        $votante1->id_barrio=$request->get('id_barrio');
        $votante1->telefono=$request->get('telefono');
        $votante1->id_lider=$request->get('id_lider');
        $votante1->id_user=$request->get('id_user');
        $votante1->estado=$request->get('estado');
    	$votante1->update();
    	return redirect('votante');
    }

    public function destroy($id){
    	$votante=votante::findOrFail($id);
    	$votante->estado='0';
    	$votante->update();
    	return redirect('votante');
    }
}
