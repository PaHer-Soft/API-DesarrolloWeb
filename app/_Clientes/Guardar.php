<?php


namespace App\_Clientes;


use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Illuminate\Database\QueryException;

class Guardar extends Controller
{
    use RegistrarClientes;

    public function getAll(){
        $consult_cliente=Clientes::all();
        return $consult_cliente;
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function crear_clientes(array $data, Request $request){
        $conectar = require 'conexionSQL.php';

        try{
            $nombre_cliente = $data['nom_cliente'];
            $direccion_cliente = $data['dire_cliente'];
            $dpi_cliente = $data['dpi_cliente'];
            $token = $data['toekn'];
            $insertar = "INSERT INTO clientes VALUES ('$nombre_cliente','$direccion_cliente','$dpi_cliente','token')";


            $query = mysqli_query($conectar, $insertar);

        }catch(QueryException $queryException){
            return redirect()->route('api.php')->with('waring', 'Ocurrio un error al registrar');
        }

        if($request->control=='form'){
            return redirect()->route('api.php')->with('success', 'Registrado Correctamente');
        }else{
            return response()->json([
                'nombre' => '1',
            ]);
        }

    }


}
