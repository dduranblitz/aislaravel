<?php

namespace Cinema\Http\Controllers;
use Cinema\Http\Requests;
use Cinema\Http\Requests\GrupoTareaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Cinema\GrupoTarea;
use Cinema\Http\Controllers\Controller;

class GrupoTareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $grupoTarea= GrupoTarea::paginate(5);    
     return view('grupoTarea.index',compact('grupoTarea'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("grupoTarea.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GrupoTareaRequest $grupoTareaRequest){
      
   $grupoTarea = new GrupoTarea;
   $grupoTarea->nombre = \Request::input('nombre');
   $grupoTarea->descripcion = \Request::input('descripcion');
   $grupoTarea->save();
   Session::flash('message','Grupo creado correctamente' );
   return Redirect::to('/grupoTarea');

  

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
