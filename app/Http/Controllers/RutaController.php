<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\RutaModelo;
use App\Models\UsuarioModelo;
use Intervention\Image\Facades\Image;


class RutaController extends Controller
{
    //! hacer 5 funciones 1-obtener todo contenido de la tabla 
    //! la dos es obtener un id 
    //! la 3 crear una nueva ruta
    //! modificar ruta ya creada
    //! borrar ruta 

    //* funcion 1
    public function index()
    {
        $ruta = RutaModelo::all();
        return response()->json($ruta);
    }



    //* funcion 2 (id)
    public function show($id)
    {
        $ruta = RutaModelo::findOrFail($id);
        return response()->json($ruta);
    }

    //FILTRA POR NIVEL

    public function nivel ($id){
        $ruta = RutaModelo::where('FK_IdNivel',$id)->get();
        return response()->json($ruta);
    }
    //* funcion 3 buscar ruta 

    public function store(Request $request)
    {

        /*  $validator = Validator::make($request->all(), [
            //* exists:NivelModelo,id (solo para las claves foraneas)
           // 'FK_IdUsuario' => 'required|string|exists:Usuario,id',
            //'FK_IdNivel' => 'required|string|exists:Usuario,id',
           // 'FK_Tipo' => 'required|string|exists:Tipo,id',
            'Nombre' => 'string',
            'Descripcion' => 'string',
            'Fecha' => 'string|date',
            'Hora' => 'string|date_format:H:i:s',
            'Tiempo' => 'string',
            'Kilometros' => 'string'

        ]);*/
        $validator = Validator::make($request->all(), [
            'Fotografia' => 'required|image|mimes:jpeg,png,jpg|max:90000',
        ]);



        if (!$validator->fails() && $request->Fotografia) {
            $fileExt = $request->Fotografia->getClientOriginalExtension();
            $filename = "ruta" . time() . '.' . $fileExt;
            $request->Fotografia->move(public_path('images'), $filename);
            // Redimensionar la imagen a 200x200
            $image = Image::make(public_path('images/' . $filename))->fit(200, 200);
            $image->save();
            $urlFoto = url('/images/' . $filename);
        }

        // if (!$validator->fails()) {
        $ruta = new RutaModelo();
        $ruta->FK_IdUsuario = $request->FK_IdUsuario;
        $ruta->FK_IdNivel = $request->FK_IdNivel;
        $ruta->FK_IdTipo = $request->FK_IdTipo;
        $ruta->Nombre = $request->Nombre;
        $ruta->Descripcion = $request->Descripcion;
        $ruta->Fecha = $request->Fecha;
        $ruta->Hora = $request->Hora;
        $ruta->Tiempo = $request->Tiempo;
        $ruta->Kilometros = $request->Kilometros;
        $ruta->Fotografia = $urlFoto;
        $ruta->Url = $request->Url; 
        

        $ruta->save();
        if ($ruta->save()) {
            return response()->json(['mensaje' => 'Se ha creado un nuevo ruta', 'ruta' => $ruta], 200);
        } else {
            return response()->json(['mensaje' => 'Error al crear el nuevo ruta'], 500);
        }
        // } else {
        //   return response()->json(['mensaje' => 'La validacion ha fallado.','Validator'=>$validator], 500);
    }

    //* funcion 4 editar rutas

    public function update(Request $request, $id)
    {
        $ruta = RutaModelo::findOrFail($id);

        if ($ruta) {
            $ruta = new RutaModelo();
            $ruta->FK_IdUsuario = $request->FK_IdUsuario;
            $ruta->FK_IdNivel = $request->FK_IdNivel;
            $ruta->FK_IdTipo = $request->FK_IdTipo;
            $ruta->Nombre = $request->Nombre;
            $ruta->Descripcion = $request->Descripcion;
            $ruta->Fecha = $request->Fecha;
            $ruta->Hora = $request->Hora;
            $ruta->Tiempo = $request->Tiempo;
            $ruta->Kilometros = $request->Kilometros;

            $FKID = $request->FK_IdUsuario;
            $idnivel = $request->FK_IdNivel;
            $nombre = $request->nombre;
            $descripcion = $request->descripcion;
            $fecha = $request->fecha;
            $hora = $request->hora;
            $tiempo = $request->tiempo;
            $kilometros = $request->kilometros;
            //! para guardar el tipo 


            $ruta->save();
            if ($ruta->save()) {
                return response()->json(['mensaje' => 'se ha actualizado correctamente', 'ruta' => $FKID, $idnivel, $nombre, $descripcion, $fecha, $hora, $tiempo, $kilometros], 200);
            } else {
                return response()->json(['mensaje' => 'Error al crear el nuevo tipo'], 500);
            }
        } else {
            return response()->json(['mensaje' => 'La validacion ha fallado por id no encontrado.'], 500);
        }
    }


    //*funcion 5 borrar ruta
    public function delete($id)
    {
        $ruta = RutaModelo::where('id', $id)->delete();

        if ($ruta) {
            return response()->json(['mensaje' => 'Ruta borrada correctamente'], 200);
        } else {
            return response()->json(['mensaje' => 'No se ha encontrado la ruta'], 404);
        }
    }
}
