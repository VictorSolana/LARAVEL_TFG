<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModelo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{


    public function index()
    {
        $usuario = UsuarioModelo::all();
        return response()->json($usuario);
    }

    public function show($id)
    {
        $usuario = UsuarioModelo::findOrFail($id);
        return response()->json($usuario);
    }

    public function store(Request $request)
    {
        /*$validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'primerapellido' => 'required|string',
            'correo' => 'required|unique:usuario|email',
            'contrasena' => 'required|string',
            'telefono' => 'required|string'

        ]);

        if (!$validator->fails()) {*/
            $usuarioModelo = new UsuarioModelo();
            $usuarioModelo->nombre = $request->nombre;
            $usuarioModelo->primerapellido = $request->primerapellido;
            $usuarioModelo->segundoapellido = $request->segundoapellido;
            $usuarioModelo->correo = $request->correo;
            $usuarioModelo->contrasena = $request->contrasena;
            $usuarioModelo->telefono = $request->telefono;

            $usuarioModelo->save();
            if ($usuarioModelo->save()) {
                return response()->json(['mensaje' => 'Se ha creado el usuario', 'usuario' => $usuarioModelo], 200);
            } else {
                return response()->json(['mensaje' => 'Error al crear usuario'], 500);
            }
      /*  } else {
            return response()->json(['mensaje' => 'El usuario no cumple los requisitos de validacion.Por favor, inténtalo de nuevo']);
        }*/
    }

    public function update(Request $request, $id)
    {
        $usuario = UsuarioModelo::findOrFail($id);
        if ($usuario) {
            $usuario->nombre = $request->nombre;
            $usuario->primerapellido = $request->primerapellido;
            $usuario->segundoapellido = $request->segundoapellido;
            $usuario->correo = $request->correo;
            $usuario->contrasena = $request->contrasena;
            $usuario->telefono = $request->telefono;

            $usuario->save();
            if ($usuario->save()) {
                return response()->json(['mensaje' => 'Usuario actualizado', 'usuario' => $usuario], 200);
            } else {
                return response()->json(['mensaje' => 'Ha habido un usuario al guardar al usuario']);
            }
        } else {
            return response()->json(['mensaje' => 'El usuario no se ha podido encontrar por id.'], 404);
        }
    }
    //* funcion borrar 
    public function delete($id)
    {
        $usuario = UsuarioModelo::findOrFail($id)->delete();
        if ($usuario) {
            return response()->json(['mensaje' => 'El usuario se ha borrado correctamente']);
        } else {
            return response()->json(['mensaje' => 'Error al borrar el usuario']);
        }
    }
}
