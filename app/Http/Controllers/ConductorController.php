<?php

namespace App\Http\Controllers;

use App\Models\Conductore;
use Illuminate\Http\Request;
use PDF;

class ConductorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $conductores = Conductore::all();
        return view('Conductor.index', compact('conductores'));
    }

    public function pdf()
    {
        $conductores = Conductore::paginate();
        $pdf = PDF::loadView('Conductor.pdf', ['conductores' => $conductores]);

        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Conductor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'Licencia' => 'required|integer|digits:7',
                'Nombre' => 'required|string|max:255',
                'Ap_Paterno' => 'required|string|max:255',
                'Ap_Materno' => 'required|string|max:255',
                'Fecha_Nac' => 'required|date|before:2004-01-01',
                'Direccion' => 'required|string|max:255',
                'Telefono' => 'required|integer|digits:8',
            ],
            [
                'Licencia.required' => 'La licencia es obligatoria.',
                'Licencia.integer' => 'La licencia debe ser un número.',
                'Licencia.digits' => 'La licencia debe tener 7 dígitos.',

                'Nombre.required' => 'El nombre es obligatorio.',
                'Nombre.string' => 'El nombre debe ser una cadena de texto.',
                'Nombre.max' => 'El nombre no debe superar los 255 caracteres.',

                'Ap_Paterno.required' => 'El apellido paterno es obligatorio.',
                'Ap_Paterno.string' => 'El apellido paterno debe ser una cadena de texto.',
                'Ap_Paterno.max' => 'El apellido paterno no debe superar los 255 caracteres.',

                'Ap_Materno.required' => 'El apellido materno es obligatorio.',
                'Ap_Materno.string' => 'El apellido materno debe ser una cadena de texto.',
                'Ap_Materno.max' => 'El apellido materno no debe superar los 255 caracteres.',

                'Fecha_Nac.required' => 'La fecha de nacimiento es obligatoria.',
                'Fecha_Nac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'Fecha_Nac.before' => 'La fecha de nacimiento debe ser anterior al 1 de enero de 2004.',

                'Direccion.required' => 'La dirección es obligatoria.',
                'Direccion.string' => 'La dirección debe ser una cadena de texto.',
                'Direccion.max' => 'La dirección no debe superar los 255 caracteres.',

                'Telefono.required' => 'El teléfono es obligatorio.',
                'Telefono.integer' => 'El teléfono debe ser un número.',
                'Telefono.digits' => 'El teléfono debe tener 8 dígitos.',
            ]
        );

        Conductore::create($request->only(['Licencia', 'Nombre', 'Ap_Paterno', 'Ap_Materno', 'Fecha_Nac', 'Direccion', 'Telefono']));
        return redirect('/Conductor')->with('success', 'Conductor creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conductor = Conductore::find($id);
        return view('Conductor.edit')->with('conductor', $conductor);
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
        $request->validate(
            [
                'Licencia' => 'required|integer|digits:7',
                'Nombre' => 'required|string|max:255',
                'Ap_Paterno' => 'required|string|max:255',
                'Ap_Materno' => 'required|string|max:255',
                'Fecha_Nac' => 'required|date|before:2004-01-01',
                'Direccion' => 'required|string|max:255',
                'Telefono' => 'required|integer|digits:8',
            ],
            [
                'Licencia.required' => 'La licencia es obligatoria.',
                'Licencia.integer' => 'La licencia debe ser un número.',
                'Licencia.digits' => 'La licencia debe tener 7 dígitos.',

                'Nombre.required' => 'El nombre es obligatorio.',
                'Nombre.string' => 'El nombre debe ser una cadena de texto.',
                'Nombre.max' => 'El nombre no debe superar los 255 caracteres.',

                'Ap_Paterno.required' => 'El apellido paterno es obligatorio.',
                'Ap_Paterno.string' => 'El apellido paterno debe ser una cadena de texto.',
                'Ap_Paterno.max' => 'El apellido paterno no debe superar los 255 caracteres.',

                'Ap_Materno.required' => 'El apellido materno es obligatorio.',
                'Ap_Materno.string' => 'El apellido materno debe ser una cadena de texto.',
                'Ap_Materno.max' => 'El apellido materno no debe superar los 255 caracteres.',

                'Fecha_Nac.required' => 'La fecha de nacimiento es obligatoria.',
                'Fecha_Nac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'Fecha_Nac.before' => 'La fecha de nacimiento debe ser anterior al 1 de enero de 2004.',

                'Direccion.required' => 'La dirección es obligatoria.',
                'Direccion.string' => 'La dirección debe ser una cadena de texto.',
                'Direccion.max' => 'La dirección no debe superar los 255 caracteres.',

                'Telefono.required' => 'El teléfono es obligatorio.',
                'Telefono.integer' => 'El teléfono debe ser un número.',
                'Telefono.digits' => 'El teléfono debe tener 8 dígitos.',
            ]
        );

        $conductor = Conductore::findOrFail($id);
        $conductor->update($request->only(['Licencia', 'Nombre', 'Ap_Paterno', 'Ap_Materno', 'Fecha_Nac', 'Direccion', 'Telefono']));
        return redirect('/Conductor')->with('success', 'Conductor actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $conductores = Conductore::find($id);
        $conductores->delete();
        return redirect('/Conductor');
    }
}
