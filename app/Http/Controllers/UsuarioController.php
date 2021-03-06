<?php namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;
use Cinema\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

class UsuarioController extends Controller {



  public function __construct(){
   $this->middleware('auth');
   $this->middleware('admin',['only'=>['create','index']]);
   $this->beforeFilter('@find',['only'=>['edit','update','destroy']]);
    }

    
   public function find(Route $route){
   	$this->user = User::find($route->getParameter('usuario'));
   ///	return $this->user;
   }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	 $users= User::paginate(3);	
	 return view('usuario.index',compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	return view('usuario.create');
	}




	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UserCreateRequest $request)
	{
	 
    $usuario = new User;
    $usuario->name = \Request::input('name');
    $usuario->email = \Request::input('email');
    $usuario->password = \Request::input('password');
    $usuario->rol = \Request::input('rol');
    $usuario->save();
    Session::flash('message','Usuario creado correctamente' );
    return Redirect::to('/usuario');



      
 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	 
	   return view('usuario.edit',['user'=>$this->user]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, UserUpdateRequest $request)
	{
	 
	$usuario = User::find($id);
    $usuario->name = \Request::input('name');
    $usuario->email = \Request::input('email');
    $usuario->password = \Request::input('password');
    $usuario->rol = \Request::input('rol');
    $usuario->save();
    Session::flash('message','Usuario editado correctamente' );
    return Redirect::to('/usuario');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

	   \DB::table('users')->where('id', '=', $id)->delete();
	   Session::flash('message','Usuario Eliminado correctamente');
       return Redirect::to('/usuario');
	
}

}
