<?php

namespace CivilOption\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use CivilOption\Http\Controllers\Controller;
Use CivilOption\Lider;
Use CivilOption\Coordinador;
Use CivilOption\Votante;


class PdfController extends Controller
{

public function totalVotantes() 
    {
        $data = DB::table('votante as v')
            ->join('lider as l','v.id_lider','=','l.id')
            ->join('users as u','v.id_user','=','u.id')
            ->join('barrio as b','v.id_barrio','=','b.id')
            ->join('puesto as p','v.id_puesto','=','p.id')
            ->select('v.id','v.cedula','v.nombre','v.apellido','v.telefono','l.nombre as nomlider','l.apellido as apelider','v.estado','u.name as nomusuario','u.lastname as apeusuario','b.nombre as nombarrio','p.nombrepuesto as puesto')
            ->where('v.estado','=','1')
            ->orderBy('v.cedula','asc')
            ->get();
        $date = date('Y-m-d');
        $invoice = "2222";
        //$view = view('pdf.totalVotantes',["data"=>$data,"date"=>$date,"invoice"=>$invoice]);
        $view =  \View::make('pdf.totalVotantes', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
        //return $view;
    }
}