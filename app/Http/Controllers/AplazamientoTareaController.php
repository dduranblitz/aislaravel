<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Cinema\Tarea;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Http\Requests\AplazamientoTareaRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cinema\AplazamientoTarea;
use Illuminate\Contracts\Auth\Guard;



class AplazamientoTareaController extends Controller
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
     $aplazamientos= AplazamientoTarea::paginate(5);    
     return view('aplazamientoTarea.index',compact('aplazamientos'))->with('rol',$rol);

    }

    
   public function getFechaFinalTarea(Request $request, $id){   
        if($request->ajax()){
            $fechaFinalTarea=AplazamientoTarea::fechaFinalTarea($id);
            return response()->json($fechaFinalTarea);    
         }
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
       return view("aplazamientoTarea.create")->with('tareas', $tareas)->with('autor', $autor);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
     public function store(AplazamientoTareaRequest $aplazamientoTareaRequest)
    {
       
         $aplazamientoTarea = new AplazamientoTarea;
        
         $aplazamientoTarea->tarea = \Request::input('tarea');
         $idTarea=\Request::input('tarea');
         
         $aplazamientoTarea->autor = \Request::input('autor');
         $aplazamientoTarea->nombreAplazamiento = \Request::input('nombreAplazamiento');
         $aplazamientoTarea->descripcionAplazamiento = \Request::input('descripcionAplazamiento');
         $aplazamientoTarea->fechaFinalizacionInicial = \Request::input('fechaFinalTarea');
         
         $aplazamientoTarea->fechaFinalizacionUltima = \Request::input('nuevaFechaFinalTarea');
         $nuevaFechaFinalTarea = \Request::input('nuevaFechaFinalTarea');
        
         $aplazamientoTarea->fecha = \Request::input('fecha');
        
         if ($aplazamientoTarea->save()){
                $tarea = Tarea::find($idTarea); 
                $tarea->fechaFinal =  $nuevaFechaFinalTarea;
                $tarea->save();
             }


         Session::flash('message','Aplazamiento agregado a tarea' );
         return Redirect::to('/aplazamientoTarea');

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
