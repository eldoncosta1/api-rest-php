<?php

namespace App\Http\Controllers;

use App\Usuario;
use Request;
use Validator;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{

	public function allUsers()
	{
		return Usuario::all();
	}

	public function getUser($id)
	{

		$usuario = Usuario::find($id);
		if(empty($usuario)){
			return Response()->json(['response' => 'Usuario não encontrado'], 400);
		}
		return Response()->json($usuario, 200);
	}

	public function saveUser()
	{

		$validator = Validator::make(
			['nome' => Request::input('nome'), 'email' => Request::input('email')],
			['nome' => 'required|min:5', 'email' => 'required']			
			
		);

		if($validator->fails()){
			return Response()->json(['response' => 'Parametros incorretos'], 400);
		}

		$params  = Request::all();
		$usuario = new Usuario($params);
		$usuario->save();
		return $usuario;
	}

	public function updateUser($id)
	{
		$validator = Validator::make(
			['nome' => Request::input('nome'), 'email' => Request::input('email')],
			['nome' => 'required|min:5', 'email' => 'required']			
			
		);

		if($validator->fails()){
			return Response()->json(['response' => 'Parametros incorretos'], 400);
		}

		$params = Input::all();		
		$usuario = Usuario::find($id);
		if(empty($usuario)) {
			return Response()->json(['response' => 'Usuario não encontrado'], 400);
		}
		$usuario->fill($params);
		$usuario->save();

		return Response()->json(['response' => 'Usuario atualizado com sucesso'], 201);
	}

	public function deleteUser($id)
	{
		$usuario = Usuario::find($id);
		if(is_null($usuario)) {
			return Response()->json(['response' => 'Usuario não encontrado'], 400);	
		}else{
			$usuario->delete();			
		}

	}
}