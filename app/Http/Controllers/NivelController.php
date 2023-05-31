<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NivelModelo;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class NivelController extends Controller
{
    
    //* funcipn 1
    public function index()
    {
        $nivel = NivelModelo::all();
        return response()->json($nivel);
    }
    //* funcipn 2
    public function show($id)
    {
        $nivel = NivelModelo::findOrFail($id);
        return response()->json($nivel);
    }
    //* funcipn 3
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'color' => 'string|min:3',
            'tipo' => 'string|min:3'
        ]);
        if (!$validator->fails()) {
            $nivel = new NivelModelo();
            $nivel->color = $request->color;
            $nivel->tipo = $request->tipo;

            $nivel->save();
            if ($nivel->save()) {
                return response()->json(['mensaje' => 'Se ha creado correctamente', 'nivel' => $nivel], 200);
            } else {
                return response()->json(['mensaje' => 'Ha habido problemas al guardar el nivel'], 500);
            }
        } else {
            return response()->json(['mensaje' => 'Validacion incorrecta']);
        }
    }
    

 

    //* funcipn 5
    public function delete($id)
    {
        $nivel = NivelModelo::where('id',$id)->delete();
        if ($nivel) {
            return response()->json(['mensaje' => 'Borrado correctamente',$id]);
        } else {
            return response()->json(['mensaje' => 'Ha habido un problema al borrar']);
        }
    }
}
