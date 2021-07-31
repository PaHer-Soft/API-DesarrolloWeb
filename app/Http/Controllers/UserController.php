<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //POST insertar datos
    public function store(Request $request)
    {
        $input = $request->all();

        $input['password']=Hash::make($request->password);

        User::create($input);

        return response()->json([
            'Respuesta' => true,
            'Mensaje' => 'Usuario creado Correctamente',
        ], 200);
    }

    public function login(Request $request){
        $user = User::whereEmail($request->email)->first();

        if(!is_null($user) && Hash::check($request->password, $user->password)){

            $token = $user->createToken('clientes')->accessToken;

            return response()->json([
                'Respuesta' => true,
                'token' => $token,
                'Mensaje' => 'Bienvenido',
            ], 200);
        }else{
            return response()->json([
                'Respuesta' => true,
                'Mensaje' => 'Email o Contraseña incorrecta',
            ], 200);
        }
    }
}
