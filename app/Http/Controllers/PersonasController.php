<?php

namespace App\Http\Controllers;

use App\Models\Personas;
//use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pagina de inicio

        $datos = Personas::orderBy('Nombre', 'desc')->paginate(3);
        return view('inicio', compact('datos'));
    }

  
    public function create()
    {
        // Formulario 
    
        return view('agregar');
    }

    
    public function store(Request $request)
    {
        // Sirve para guardar datos en la BD


        $personas = new Personas();
        $personas->Nombre = $request->post('Nombre');
        $personas->Email = $request->post('Email');
        $personas->Contraseña = $request->post('Contraseña');
        
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Agregado con exito!");
    }

    
    public function show($id)
    {
        // Obtener un registro de nuestra tabla

        $personas = Personas::find($id);
        return view("eliminar" , compact('personas'));
    }

    
    public function edit($id)
    {
        // Datos que seran obtenidos para editar y seran colocados en el formulario

        $personas = Personas::find($id);
        return view("actualizar" , compact('personas'));
    }

    
    public function update(Request $request, $id)
    {
        // Acrttualiza los datos en la BD

        $personas = Personas::find($id);
        $personas->Nombre = $request->post('Nombre');
        $personas->Email = $request->post('Email');
        $personas->Contraseña = $request->post('Contraseña');
        $personas->save();

        return redirect()->route("personas.index")->with("success", "Actualizado con exito!");
    }

    
    public function destroy($id)
    {
        // Elimina un registro

        $personas = Personas::find($id);
        $personas->delete();
        return redirect()->route("personas.index")->with("success", "Eliminado con exito!");
    }


    

}
