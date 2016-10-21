<?php

namespace Cinema\Http\Controllers;
use Cinema\Http\Requests;
use Cinema\Http\Requests\GrupoTareaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Cinema\GrupoTarea;
use Cinema\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

class GrupoTareaController extends Controller
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
     $integrantesGrupo = \DB::table('integrantes_grupos')->get();   
     $grupoTarea= GrupoTarea::paginate(5);    
     return view('grupoTarea.index',compact('grupoTarea'))->with('integrantesGrupo', $integrantesGrupo)->with('rol',$rol);  
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
        return view('grupoTarea.edit')->with('grupo', GrupoTarea::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, GrupoTareaRequest $grupoTareaRequest)
    {
        
    $grupoTarea = GrupoTarea::find($id);
    $grupoTarea->nombre = \Request::input('nombre');
    $grupoTarea->descripcion = \Request::input('descripcion');
    $grupoTarea->save();
    Session::flash('message','Grupo editado correctamente' );
    return Redirect::to('/grupoTarea');
 

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('grupo_tareas')->where('id', '=', $id)->delete();
        Session::flash('message','Grupo Eliminado correctamente');
        return Redirect::to('/grupoTarea');
    }
}
