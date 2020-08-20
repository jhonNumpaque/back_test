<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    public function listPerson()
    {
        return response()->json(
            [
                'status' => 'success',
                'data' => Persona::get()
            ]
        );
    }

    public function findPerson($id){
        return response()->json([ 'status' => 'success', 'data' => Persona::findOrFail($id) ]);
    }

    public function createPerson(Request $request){

        $validador = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required'
        ]);

        if ($validador->fails()) {
            return response()->json(['status' => 'error', 'data' => $validador->errors()]);
        }

        $persona = new Persona();
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;

        if ($persona->save()) {
            return response()->json(['status' => "success", 'data' => true ]);
        } else {
            return response()->json(['status' => "Error al guardar", 'data' => false ]);
        }

    }

    public function editPeson(Request $request)
    {
        $validador = Validator::make($request->all(), [
            'nombres' => 'required',
            'apellidos' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'id' => 'required|numeric'
        ]);

        if ($validador->fails()) {
            return response()->json(['status' => 'error', 'data' => $validador->errors()]);
        }

        $persona = Persona::findOrFail($request->id);
        $persona->nombres = $request->nombres;
        $persona->apellidos = $request->apellidos;
        $persona->correo = $request->correo;
        $persona->telefono = $request->telefono;
        $persona->direccion = $request->direccion;
        if ($persona->save()) {
            return response()->json(['status' => "success", 'data' => true ]);
        } else {
            return response()->json(['status' => "success", 'data' => false ]);
        }
    }

    public function deletePerson($id)
    {
        if (Persona::findOrFail($id)->delete()) {
            return response()->json(['status' => "success", 'data' => true ]);
        } else {
            return response()->json(['status' => "Error al eliminar", 'data' => false ]);
        }
    }
}
