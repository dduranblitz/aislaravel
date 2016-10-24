<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Http\Requests\SeguimientoTareaRequest;
use Cinema\Http\Requests\SeguimientoTareaUpdateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cinema\SeguimientoTarea;
use Illuminate\Contracts\Auth\Guard;


class SeguimientoTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


      protected $authorizacion;

     public function __construct(Guard $auth){
      $this->authorizacion=$auth; 
      $this->middleware('auth');
      $this->middleware('admin',['only'=>['create']]);
    }

    public function index()
    {
     $rol=$this->authorizacion->user()->rol; 
     $seguimientos= SeguimientoTarea::paginate(5);    
     return view('seguimientoTarea.index',compact('seguimientos'))->with('rol',$rol); ;


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
       $tareas = \DB::table('tareas')->lists('nombreTarea', 'id');
       $autor = \DB::table('users')->lists('name', 'id');
       return view('seguimientoTarea.edit')->with('seguimiento', SeguimientoTarea::find($id))->with('tareas', $tareas)->    with('autor', $autor);


     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, SeguimientoTareaUpdateRequest $seguimientoTareaUpdateRequest)
    {
        
         $seguimientoTarea = SeguimientoTarea::find($id);
         $seguimientoTarea->idTarea = \Request::input('idTarea');
         $seguimientoTarea->idAutor = \Request::input('idAutor');
         $seguimientoTarea->nombreSeguimiento = \Request::input('nombreSeguimiento');
         $seguimientoTarea->descripcionSeguimiento = \Request::input('descripcionSeguimiento');
         $seguimientoTarea->fecha = \Request::input('fecha');
         $seguimientoTarea->save();
         Session::flash('message','Seguimiento editado correctamente' );
         return Redirect::to('/seguimientoTarea');

    }

    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         \DB::table('seguimiento_tareas')->where('id', '=', $id)->delete();
         Session::flash('message','Seguimiento Eliminado correctamente');
         return Redirect::to('/seguimientoTarea');
    }
}
