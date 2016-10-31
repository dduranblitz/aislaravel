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
use Illuminate\Contracts\Auth\Guard;
use Mail;
class TareaController extends Controller
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
   $this->middleware('admin',['only'=>['create','cambiarEstadoTarea']]);
    }




    public function index()
    {
   
     $rol=$this->authorizacion->user()->rol;
     $tareas= Tarea::paginate(5);    
     return view('tarea.index',compact('tareas'))->with('rol', $rol);   
     
    }



     public function cambiarEstadoTarea()
    {
   
     $tareas= Tarea::paginate(5);    
     return view('tarea.cambiarEstadoTarea',compact('tareas')); 

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
         $tarea->fechaInicio =\Request::input('fechaInicio');
         $tarea->fechaFinal =\Request::input('fechaFinal');
         $tarea->cicloTarea = \Request::input('cicloTarea');
     }

  if(\Request::input('tareaCiclica')=='no'){
     $tarea->fechaInicio =\Request::input('fechaInicio');
     $tarea->fechaFinal =\Request::input('fechaFinal');
     $tarea->cicloTarea = NULL;
  }

   $tarea->autor  = \Request::input('autor');

  $tarea->tipoResponsable = \Request::input('tipoResponsable');
 if(\Request::input('tipoResponsable')=='persona'){
   $tarea->personaResponsable = \Request::input('personaResponsable');  
   $idPersonaResponsable=\Request::input('personaResponsable');
   $tarea->grupoResponsable = NULL;
  }


 if(\Request::input('tipoResponsable')=='grupo'){
   $tarea->grupoResponsable = \Request::input('grupoResponsable');  
   $tarea->personaResponsable = NULL;
 }

/////guardar el avance inicial como cero 0%
  $tarea->avanceTarea=0;
  $tarea->observador = \Request::input('observador');
  ////tarea sin aprobar
  $tarea->estadoTarea = 1;


/////enviar correos notificacion
   if( $tarea->save() ) {
    
     ////enviar a personas 
   if(\Request::input('tipoResponsable')=='persona'){
       $email = \DB::table('users')->where('id', $idPersonaResponsable)->value('email');
       $autorTarea = \DB::table('users')->where('id', \Request::input('autor') )->value('name');
    
       Mail::send('emails.tareaIndividual' , ['nombreTarea'=>\Request::input('nombreTarea'),
                                      'fechaInicio'=>\Request::input('fechaInicio'),
                                      'autorTarea'=>$autorTarea

                                     ], function($msj) use($email){
                                      $msj->subject('Tarea Asginada o modificada para usted en AIS');
                                      $msj->to($email);
                                         });  

             }


////enviar a personas integrantes de grupo
  if(\Request::input('tipoResponsable')=='grupo'){
       $integrantes_grupo = \DB::table('integrantes_grupos')->where('idGrupo', \Request::input('grupoResponsable'))->get();
       $autorTarea = \DB::table('users')->where('id', \Request::input('autor') )->value('name');
    
      
      foreach ($integrantes_grupo as $integrante) { 
            $email = \DB::table('users')->where('id', $integrante->idUsuario)->value('email');
            Mail::send('emails.tareaGrupal' , ['nombreTarea'=>\Request::input('nombreTarea'),
                                           'fechaInicio'=>\Request::input('fechaInicio'),
                                           'autorTarea'=>$autorTarea

                                     ], function($msj) use($email){
                                      $msj->subject('Tarea grupal Asginada o modificada para usted en AIS');
                                      $msj->to($email);
                                         });  
                 }
            

             }           

    }


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
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarios = \DB::table('users')->lists('name', 'id');
        $grupoTarea = \DB::table('grupo_tareas')->lists('nombre', 'id');
        return view('tarea.edit')->with('tarea', Tarea::find($id))->with('usuarios', $usuarios)->with('grupoTarea', $grupoTarea);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, TareaForm $tareaForm){
    
    $tarea = Tarea::find($id);
    $tarea->nombreTarea = \Request::input('nombreTarea');
    $tarea->tareaCiclica = \Request::input('tareaCiclica');
  
  if(\Request::input('tareaCiclica')=='si'){
   $tarea->fechaInicio =\Request::input('fechaInicio');
   $tarea->fechaFinal =\Request::input('fechaFinal');
   $tarea->cicloTarea = \Request::input('cicloTarea');
   }

  if(\Request::input('tareaCiclica')=='no'){
   $tarea->fechaInicio =\Request::input('fechaInicio');
   $tarea->fechaFinal =\Request::input('fechaFinal');
   $tarea->cicloTarea = NULL;
  }

   $tarea->autor  = \Request::input('autor');
   $tarea->tipoResponsable = \Request::input('tipoResponsable');
 
 if(\Request::input('tipoResponsable')=='persona'){
   $tarea->personaResponsable = \Request::input('personaResponsable');  
   $idPersonaResponsable=\Request::input('personaResponsable');
   $tarea->grupoResponsable = NULL;
  }

 if(\Request::input('tipoResponsable')=='grupo'){
   $tarea->grupoResponsable = \Request::input('grupoResponsable');  
   $tarea->personaResponsable = NULL;
  }

  $tarea->observador = \Request::input('observador');

  
  /////enviar correos notificacion
   if( $tarea->save() ) {
    
     ////enviar a personas 
   if(\Request::input('tipoResponsable')=='persona'){
       $email = \DB::table('users')->where('id', $idPersonaResponsable)->value('email');
       $autorTarea = \DB::table('users')->where('id', \Request::input('autor') )->value('name');
    
       Mail::send('emails.tareaIndividual' , ['nombreTarea'=>\Request::input('nombreTarea'),
                                      'fechaInicio'=>\Request::input('fechaInicio'),
                                      'autorTarea'=>$autorTarea

                                     ], function($msj) use($email){
                                      $msj->subject('Tarea Asginada o modificada para usted en AIS');
                                      $msj->to($email);
                                         });  

             }



    ////enviar a personas integrantes de grupo
  if(\Request::input('tipoResponsable')=='grupo'){
       $integrantes_grupo = \DB::table('integrantes_grupos')->where('idGrupo', \Request::input('grupoResponsable'))->get();
       $autorTarea = \DB::table('users')->where('id', \Request::input('autor') )->value('name');
    
      
      foreach ($integrantes_grupo as $integrante) { 
            $email = \DB::table('users')->where('id', $integrante->idUsuario)->value('email');
            Mail::send('emails.tareaGrupal' , ['nombreTarea'=>\Request::input('nombreTarea'),
                                               'fechaInicio'=>\Request::input('fechaInicio'),
                                                'autorTarea'=>$autorTarea

                                     ], function($msj) use($email){
                                      $msj->subject('Tarea grupal Asginada o modificada para usted en AIS');
                                      $msj->to($email);
                                         });  
                 }
            

             }     



    }



  Session::flash('message','Tarea editada correctamente' );
  return Redirect::to('/tarea');


    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         \DB::table('tareas')->where('id', '=', $id)->delete();
         Session::flash('message','Tarea Eliminada correctamente');
         return Redirect::to('/tarea');
    }




 public function getCalendarioTareas()
    {
   
     $usuarios = \DB::table('users')->lists('name', 'id'); 
     return view('tarea.calendarioTareas')->with('usuarios', $usuarios);   
     
    }



   public function getCalendarioJsonTareas(Request $request){   
        if($request->ajax()){
            $calendarioJsonTareas=Tarea::calendarioJsonTareas();
            return response()->json($calendarioJsonTareas);    
         }
    } 


  public function setearTareas($id,$idEstado)
    {    
        $tarea = Tarea::find($id);
        $tarea->estadoTarea =$idEstado;
        if($idEstado==4){
          $tarea->avanceTarea =100;
        }
        $tarea->save();
        Session::flash('message','Estado Tarea guardado correctamente' );
        return Redirect::to('tarea');


    }




}
