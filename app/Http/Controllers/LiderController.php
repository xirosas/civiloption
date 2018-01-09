<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
use CivilOption\Http\Requests\LiderFormRequest;
Use CivilOption\Lider;
Use CivilOption\Coordinador;

class LiderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$user = Auth::user();
    		$lideres=DB::table('lider as l')
            ->join('coordinador as c','l.id_coordinador','=','c.id')
            ->select('l.id','l.cedula','l.nombre','l.apellido','l.telefono','l.direccion','c.apellido as apecoordinador','c.nombre as nomcoordinador','l.estado')
            ->where('l.estado','=','1')
            ->where('l.cedula','LIKE','%'.$query.'%')
            ->where('l.nombre','LIKE','%'.$query.'%')
    		->orderBy('l.cedula','asc')
    		->paginate(15);
    		$count = DB::table('lider')->where('estado','=','1')->count();
    		return view('lider.index',["usuario"=>$user,"lideres"=>$lideres,"searchText"=>$query,"contador"=>$count]);
    	}
    }

     public function create(){
     	$user = Auth::user();
     	$count = DB::table('lider')->where('estado','=','1')->count();
        $coordinadores=DB::table('coordinador')->where('estado','=','1')->get();
    	return view('lider.create',["usuario"=>$user,"contador"=>$count,"coordinadores"=>$coordinadores]);
    }

    public function store (LiderFormRequest $request){
    	$lider1=new lider;
    	$lider1->cedula=$request->get('cedula');
    	$lider1->nombre=$request->get('nombre');
    	$lider1->apellido=$request->get('apellido');
    	$lider1->direccion=$request->get('direccion');
    	$lider1->telefono=$request->get('telefono');
    	$lider1->id_coordinador=$request->get('id_coordinador');
    	$lider1->save();
    	return redirect('lider');
    }

    public function show($id){
    	return view("lider.show",["lider"=>lider::findOrFail($id)]);
    }

    public function edit($id){
        $lider=lider::findOrFail($id);
        $coordinadores=DB::table('coordinador')
        ->where('estado','=','1')
        ->get();
    	$user = Auth::user();
     	$count = DB::table('lider')->where('estado','=','1')->count();
    	return view("lider.edit",["lider"=>$lider,"coordinadores"=>$coordinadores,"usuario"=>$user,"contador"=>$count ]);
    }

    public function update(LiderFormRequest $request,$id){
    	$lider1=lider::findOrFail($id);
    	$lider1->cedula=$request->get('cedula');
    	$lider1->nombre=$request->get('nombre');
    	$lider1->apellido=$request->get('apellido');
    	$lider1->direccion=$request->get('direccion');
    	$lider1->telefono=$request->get('telefono');
    	$lider1->id_coordinador=$request->get('id_coordinador');
    	$lider1->update();
    	return redirect('lider');
    }

    public function destroy($id){
    	$lider=lider::findOrFail($id);
    	$lider->estado='0';
    	$lider->update();
    	return redirect('lider');
    }
}
