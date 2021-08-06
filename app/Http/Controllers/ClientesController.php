<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    //GET listar registros
    public function index(Request $request)
    {
        //Buscar por medio del Nombre o DPI
        if($request->has('txtBuscar')){
            $clientes = Clientes::where('nom_cliente', 'like', '%' .  $request->txtBuscar .'%' )
                ->orWhere('dpi_cliente', $request->txtBuscar)
                ->get();
        }else{
            $clientes = Clientes::all();
        }
        return $clientes;
    }

    //POST insertar datos
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();
        Clientes::create($input);

        return response()->json([
            'Respuesta' => true,
            'Mensaje' => 'Registro creado Correctamente',
        ], 200);
    }

    //GET retorna un solo registro
    public function show(Clientes $cliente)
    {
        return $cliente;
    }


    //PUT actualizar Registros
    public function update(UpdateClienteRequest $request, Clientes $route_cliente)
    {
        $input = $request->all();
        $route_cliente->update($input);

        return response()->json([
            'Respuesta' => true,
            'Mensaje' => 'Registro Actualizado Correctamente'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Clientes::destroy($id);
        return response()->json([
            'Respuesta' => true,
            'Mensaje' => 'Registro Eliminado Correctamente'
        ], 200);
    }
}
