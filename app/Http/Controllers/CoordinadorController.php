<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
use CivilOption\Http\Requests\CoordinadorFormRequest;
Use CivilOption\Coordinador;

class CoordinadorController extends Controller
{
    //    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$user = Auth::user();
    		$coordinadores=DB::table('coordinador')
            ->where('nombre','LIKE','%'.$query.'%')
            ->orwhere('cedula','LIKE','%'.$query.'%')
            ->orwhere('apellido','LIKE','%'.$query.'%')
    		->where('estado','=','1')
    		->orderBy('cedula','asc')
    		->paginate(10);
    		$count = DB::table('coordinador')->where('estado','=','1')->count();
    		return view('coordinador.index',["usuario"=>$user,"coordinadores"=>$coordinadores,"searchText"=>$query,"contador"=>$count]);
    	}
    }

     public function create(){
     	$user = Auth::user();
     	$count = DB::table('coordinador')->where('estado','=','1')->count();
    	return view('coordinador.create',["usuario"=>$user,"contador"=>$count]);
    }

    public function store (CoordinadorFormRequest $request){
    	$coordinador1=new coordinador;
    	$coordinador1->cedula=$request->get('cedula');
    	$coordinador1->nombre=$request->get('nombre');
    	$coordinador1->apellido=$request->get('apellido');
    	$coordinador1->direccion=$request->get('direccion');
    	$coordinador1->telefono=$request->get('telefono');
    	$coordinador1->save();
    	return redirect('coordinador');
    }

    public function show($id){
    	return view("coordinador.show",["coordinador"=>coordinador::findOrFail($id)]);
    }

    public function edit($id){
    	$user = Auth::user();
     	$count = DB::table('coordinador')->where('estado','=','1')->count();
    	return view("coordinador.edit",["coordinador"=>coordinador::findOrFail($id), "usuario"=>$user,"contador"=>$count ]);
    }

    public function update(CoordinadorFormRequest $request,$id){
    	$coordinador1=coordinador::findOrFail($id);
    	$coordinador1->cedula=$request->get('cedula');
    	$coordinador1->nombre=$request->get('nombre');
    	$coordinador1->apellido=$request->get('apellido');
    	$coordinador1->direccion=$request->get('direccion');
    	$coordinador1->telefono=$request->get('telefono');
    	$coordinador1->update();
    	return redirect('coordinador');
    }

    public function destroy($id){
    	$coordinador1=coordinador::findOrFail($id);
    	$coordinador1->estado='0';
    	$coordinador1->update();
    	return redirect('coordinador');
    }
}
