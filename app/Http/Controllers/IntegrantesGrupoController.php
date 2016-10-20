<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Http\Requests\IntegrantesGrupoRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Cinema\IntegrantesGrupo;


class IntegrantesGrupoController extends Controller
  {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  public function __construct(){
      $this->middleware('auth');
       $this->middleware('admin',['only'=>['index']]);
    }


    public function index()
    {
         $usuarios = \DB::table('users')->lists('name', 'id');
         $grupoTarea = \DB::table('grupo_tareas')->lists('nombre', 'id');
         return view("integrantesGrupo.create")->with('usuarios', $usuarios)->with('grupoTarea', $grupoTarea);
    }


   public function getIntegrantesGrupo(Request $request, $id){   
        if($request->ajax()){
            $integrantesGrupo=IntegrantesGrupo::integrantesPorAgregar($id);
            return response()->json($integrantesGrupo);    
         }
    }


    public function getIntegrantesGrupoEliminar(Request $request, $id){   
        if($request->ajax()){
            $integrantesGrupoEliminar=IntegrantesGrupo::integrantesPorEliminar($id);
            return response()->json($integrantesGrupoEliminar);    
         }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    $usuarios = \DB::table('users')->lists('name', 'id');
    $grupoTarea = \DB::table('grupo_tareas')->lists('nombre', 'id');
    return view("integrantesGrupo.create")->with('usuarios', $usuarios)->with('grupoTarea', $grupoTarea);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IntegrantesGrupoRequest $integrantesGrupoRequest)
    {
         $integrantesGrupo = new IntegrantesGrupo;
         $integrantesGrupo->idUsuario = \Request::input('idUsuario');
         $integrantesGrupo->idGrupo = \Request::input('idGrupo');
         $integrantesGrupo->save();
         Session::flash('message','Integrante anadido al grupo' );
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
         $idUsuarioEliminar = \Request::input('idUsuarioEliminar');
         $idGrupoEliminar = \Request::input('idGrupoEliminar');
         \DB::table('integrantes_grupos')->where('idUsuario', '=', $idUsuarioEliminar)
                                        ->where('idGrupo', '=', $idGrupoEliminar)
                                        ->delete();
         
         Session::flash('message','Integrante eliminado del grupo' );
         return Redirect::to('/grupoTarea');


    }



}
