<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    //GET listar registros
    public function index(Request $request)
    {
        //Buscar por medio del Nombre o DPI
        if($request->has('txtBuscar')){
            $clientes = Clientes::where('nom_cliente', 'like', '%'.  $request->txtBuscar .'%' )
                ->orWhere('dpi_cliente', $request->txtBuscar)
                ->get();
        }else{
            $clientes = Clientes::all();
        }
        return $clientes;
    }

    //POST insertar datos
    public function store(Request $request)
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
