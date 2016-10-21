<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Http\Requests\SeguimientoTareaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cinema\SeguimientoTarea;



class SeguimientoTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
       $tareas = \DB::table('tareas')->lists('nombreTarea', 'id');
       $autor = \DB::table('users')->lists('name', 'id');
       return view("seguimientoTarea.create")->with('tareas', $tareas)->with('autor', $autor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeguimientotareaRequest $seguimientoTareaRequest)
    {
       
         $seguimientoTarea = new SeguimientoTarea;
         $seguimientoTarea->idTarea = \Request::input('tarea');
         $seguimientoTarea->idAutor = \Request::input('autor');
         $seguimientoTarea->nombreSeguimiento = \Request::input('nombreSeguimiento');
         $seguimientoTarea->descripcionSeguimiento = \Request::input('descripcionSeguimiento');
         $seguimientoTarea->fecha = \Request::input('fecha');
         $seguimientoTarea->save();
         Session::flash('message','Seguimiento agregado a tarea' );
         return Redirect::to('/seguimientoTarea');

    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
