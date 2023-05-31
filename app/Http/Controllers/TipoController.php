<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
//! esta parte es para: cojer el contro
use Illuminate\Routing\Controller;
//! inportar el modelo (tablas:filas,columnas...etc)
use App\Models\TipoModelo;

class TipoController extends Controller
{

    public function index()
    {
        $tipo = TipoModelo::All();
        return response()->json($tipo);
    }


    //! obtener datos por id
    public function show($id)
    {
        $tipo = TipoModelo::findOrFail($id);
        return response()->json($tipo);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tipo' => 'string|min:2',
            'descripcion' => 'string'
        ]);


        if (!$validator->fails()) {
            $tipo = new TipoModelo();
            $tipo->tipo = $request->tipo;
            $tipo->descripcion = $request->descripcion;

            $tipo->save();
            if ($tipo->save()) {
                return response()->json(['mensaje' => 'Se ha creado un nuevo tipo', 'tipo' => $tipo], 200);
            } else {
                return response()->json(['mensaje' => 'Error al crear el nuevo tipo'], 500);
            }
        } else {
            return response()->json(['mensaje' => 'La validacion ha fallado.'], 500);
        }
    }

    //* actualizar ruta
    public function update(Request $request, $id)
    {
        $tipo = TipoModelo::where('id', $id)->first();
        if ($tipo) {
            $tipo->tipo = $request->tipo;
            $tipo->descripcion = $request->descripcion;

           // $tipo->save();

            if ($tipo->save()) {
                return response()->json(['mensaje' => 'Actualizado', $tipo], 200);
            } else {
                return response()->json(['mensaje' => 'No se ha podido actualizar'], 404);
            }
        }

        return response()->json(['mensaje' => 'Se ha creado correctamente', 'tipo' => $tipo], 200);
    }


    public function delete($id)
    {
        $tipo = TipoModelo::where('Id', $id)->delete();

        if ($tipo) {
            return response()->json(['mensaje' => 'Tipo borrado correctamente'], 200);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el tipo de ruta'], 404);
        }
    }
}
