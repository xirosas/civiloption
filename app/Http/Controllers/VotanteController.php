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
            ->select('v.id','v.cedula','v.nombre','v.apellido','v.telefono','v.ubicacion','l.nombre as nomlider','l.apellido as apelider','v.estado','u.name as nomusuario','u.lastname as apeusuario','v.mesa','v.puesto')
            ->where('v.estado','=','1')
            ->where('v.cedula','LIKE','%'.$query.'%')
            ->where('v.nombre','LIKE','%'.$query.'%')
    		->orderBy('v.cedula','asc')
    		->paginate(15);
    		$count = DB::table('votante')->where('estado','=','1')->count();
    		return view('votante.index',["votantes"=>$votantes,"searchText"=>$query,"contador"=>$count]);
    	}
    }

     public function create(){
     	$count = DB::table('votante')->where('estado','=','1')->count();
        $lideres=DB::table('lider')->where('estado','=','1')->get();
    	return view('votante.create',["contador"=>$count,"lideres"=>$lideres]);
    }

    public function store (VotanteFormRequest $request){
    	$votante1=new votante;
    	$votante1->cedula=$request->get('cedula');
    	$votante1->nombre=$request->get('nombre');
    	$votante1->apellido=$request->get('apellido');
    	$votante1->ubicacion=$request->get('ubicacion');
    	$votante1->telefono=$request->get('telefono');
    	$votante1->mesa=$request->get('mesa');
    	$votante1->puesto=$request->get('puesto');
    	$votante1->id_lider=$request->get('id_lider');
    	$votante1->id_user=$request->get('id_user');
    	$votante1->save();
    	return redirect('votante');
    }

    public function show($id){
    	return view("votante.show",["votante"=>votante::findOrFail($id)]);
    }

    public function edit($id){
        $votante=votante::findOrFail($id);
        $lideres=DB::table('lider')
        ->where('estado','=','1')
        ->get();
    	$count = DB::table('votante')->where('estado','=','1')->count();
    	return view("votante.edit",["votante"=>$votante,"lideres"=>$lideres,"contador"=>$count ]);
    }

    public function update(VotanteFormRequest $request,$id){
    	$votante1=votante::findOrFail($id);
    	$votante1->cedula=$request->get('cedula');
    	$votante1->nombre=$request->get('nombre');
    	$votante1->apellido=$request->get('apellido');
    	$votante1->ubicacion=$request->get('ubicacion');
    	$votante1->telefono=$request->get('telefono');
    	$votante1->mesa=$request->get('mesa');
    	$votante1->puesto=$request->get('puesto');
    	$votante1->id_lider=$request->get('id_lider');
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
