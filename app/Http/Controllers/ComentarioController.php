<?php

namespace App\Http\Controllers;

use App\Models\ComentarioModelo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
//* validator
use Illuminate\Support\Facades\Validator;

class ComentarioController extends Controller
{
    //*funcion 1

    public function index(){
        $comentario = ComentarioModelo::All();
        return response()->json($comentario);
    }

//* funcion 2
    public function show($id){
        $comentario = ComentarioModelo::findOrFail($id);
        return response()->json($comentario);
    }
//*funcion3

    public function store(Request $request){
       /* $validator = Validator::make($request->all(),[
            'Fechahoracomentario' => 'string',
            'FK_IdUsuario' => 'exists:Usuario,id',
            'FK_Idruta' => 'exists:Ruta,id|string',
            'Descripcion' => 'string',
            'Puntuacion' => 'string'
        ]);   */
        //if(!$validator->fails()){
            $comentario = new ComentarioModelo();
            $comentario->Fechahoracomentario=$request->Fechahoracomentario;
            $comentario->FK_IdUsuario=$request->FK_IdUsuario;
            $comentario->FK_IdRuta=$request->FK_IdRuta;
            $comentario->Descripcion=$request->Descripcion;
            $comentario->Puntuacion=$request->Puntuacion;

            $comentario->save();

            if ($comentario->save()) {
                return response()->json(['mensaje' => 'Se ha creado un nuevo tipo', 'tipo' => $comentario], 200);
            } else {
                return response()->json(['mensaje' => 'Error al crear el nuevo tipo'], 500);
            }
        /*} else {
            return response()->json(['mensaje' => 'La validacion ha fallado.'], 500);
        }*/
    }
   
    //* funcion 4 editar rutas

    public function update(Request $request, $id)
    {
        $comentario = ComentarioModelo::findOrFail($id);

        if ($comentario) {
         
            $comentario->fechahoracomentario=$request->fechahoracomentario;
            $comentario->fk_idUsuario=$request->fk_idusuario;
            $comentario->fk_idruta=$request->fk_idruta;
            $comentario->descripcion=$request->descripcion;
            $comentario->puntuacion=$request->puntuacion;

            //! para guardar el tipo 
            $comentario->save();
            if ($comentario->save()) {
                return response()->json(['mensaje' => 'se ha creado correctamente', 'comentario' => $comentario], 200);
            } else {
                return response()->json(['mensaje' => 'Error al crear el nuevo comentario'], 500);
            }
        } else {
            return response()->json(['mensaje' => 'La validacion ha fallado por id no encontrado.'], 500);
        }
    }
//* funcuin para borrar un comentario 
    public function delete($id){
        $comentario = ComentarioModelo::where('Id',$id)->delete();
        if ($comentario) {
            return response()->json(['mensaje' => 'Comentario borrado correctamente'], 200);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado el comentario de ruta'], 404);
        }
    }

}