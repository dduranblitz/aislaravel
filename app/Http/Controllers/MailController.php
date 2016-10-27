<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Tarea;
use Illuminate\Routing\Route;



class MailController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
      Mail::send('emails.contact','fddfdfddgffg',function($msj){
        $msj->subject('Correo de prueba');
        $msj->to('shakadevirgo780@hotmail.com');

        Session::flash('message','Mensaje enviado correctamente');
        return Redirect::to('tarea');

      }); 


    }


    public function enviarCorreo()
    {
    
        Mail::send('emails.contact' ,['nombre'=>'diego','apellido'=>'duran'],function($msj){
        $msj->subject('Correo de prueba');
        $msj->to('shakadevirgo780@hotmail.com');

        Session::flash('message','Mensaje enviado correctamente');
        return Redirect::to('/tarea');

      }); 


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
