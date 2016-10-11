<?php namespace Cinema\Http\Controllers;
use Cinema\Http\Requests;
use Cinema\Http\Requests\TareaForm;
use Cinema\Http\Controllers\Controller;
use Cinema\Tarea;
use Cinema\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
     $tareas= Tarea::paginate(5);    
     return view('tarea.index',compact('tareas'));   
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
    $usuarios = \DB::table('users')->where('deleted_at','=',NULL)->lists('name', 'id');
    $grupoTarea = \DB::table('grupo_tareas')->lists('nombre', 'id');
    return view('tarea.create')->with('usuarios', $usuarios)->with('grupoTarea', $grupoTarea);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TareaForm $tareaForm){

    $tarea = new Tarea;
    $tarea->nombreTarea = \Request::input('nombreTarea');
    $tarea->tareaCiclica = \Request::input('tareaCiclica');
 if(\Request::input('tareaCiclica')=='si'){
   $tarea->fechaInicio =NULL;
   $tarea->fechaFinal =NULL;
   $tarea->cicloTarea = \Request::input('cicloTarea');
}

if(\Request::input('tareaCiclica')=='no'){
   $tarea->fechaInicio =\Request::input('fechaInicio');
   $tarea->fechaFinal =\Request::input('fechaFinal');;
   $tarea->cicloTarea = NULL;
}

$tarea->autor  = \Request::input('autor');

$tarea->tipoResponsable = \Request::input('tipoResponsable');
if(\Request::input('tipoResponsable')=='persona'){
  $tarea->personaResponsable = \Request::input('personaResponsable');  
  $tarea->grupoResponsable = NULL;
}


if(\Request::input('tipoResponsable')=='grupo'){
  $tarea->grupoResponsable = \Request::input('grupoResponsable');  
  $tarea->personaResponsable = NULL;
}

$tarea->observador = \Request::input('observador');

 $tarea->save();
 Session::flash('message','Tarea creada correctamente' );
 return Redirect::to('/tarea');


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
