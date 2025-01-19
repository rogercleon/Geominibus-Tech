<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use PDF;

class ClienteController extends Controller
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
        $clientes = Cliente::all();
        return view('Cliente.index', compact('clientes'));
    }

    public function pdf()
    {
        $clientes = Cliente::paginate();
        $pdf = PDF::loadView('Cliente.pdf', ['clientes' => $clientes]);

        return $pdf->stream();

        //$pdf = PDF::loadView('Bus.pdf',['buses'=>$buses]);
        //$pdf->loadHTML('<h2>Reporte de Buses</h2>');
        //return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Cliente.create');
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
                'CI' => 'required|numeric|digits:7',
                'Nombre' => 'required|string|max:255',
                'Ap_Paterno' => 'required|string|max:255',
                'Ap_Materno' => 'required|string|max:255',
                'Fecha_Nac' => 'required|date|before_or_equal:today',
                'Direccion' => 'required|string|max:255',
                'Telefono' => 'required|numeric|digits:8',
                'Correo' => 'nullable|email',
            ],
            [
                'CI.required' => 'El CI es obligatorio.',
                'CI.numeric' => 'El CI debe ser un valor numérico.',
                'CI.digits' => 'El CI debe tener 7 dígitos.',
                'Nombre.required' => 'El nombre es obligatorio.',
                'Nombre.string' => 'El nombre debe ser una cadena de texto.',
                'Nombre.max' => 'El nombre no debe superar los 255 caracteres.',
                'Ap_Paterno.required' => 'El apellido paterno es obligatorio.',
                'Ap_Paterno.string' => 'El apellido paterno debe ser una cadena de texto.',
                'Ap_Paterno.max' => 'El apellido paterno no debe superar los 255 caracteres.',
                'Ap_Materno.required' => 'El apellido materno es obligatorio.',
                'Ap_Materno.string' => 'El apellido paterno debe ser una cadena de texto.',
                'Ap_Materno.max' => 'El apellido paterno no debe superar los 255 caracteres.',
                'Fecha_Nac.required' => 'La fecha de nacimiento es obligatoria.',
                'Fecha_Nac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'Fecha_Nac.before_or_equal' => 'La fecha de nacimiento no debe ser menor a la fecha actual.',
                'Direccion.required' => 'La dirección es obligatoria.',
                'Telefono.required' => 'El teléfono es obligatorio.',
                'Telefono.numeric' => 'El teléfono debe ser un valor numérico.',
                'Telefono.digits' => 'El teléfono debe tener 8 dígitos.',
                'Correo.email' => 'El correo electrónico debe ser válido.',
            ]
        );
        Cliente::create($request->only(['CI', 'Nombre', 'Ap_Paterno', 'Ap_Materno', 'Fecha_Nac', 'Direccion', 'Telefono', 'Correo']));
        //return redirect('/Cliente')->with('success', 'Cliente creado con éxito');
        //return redirect()->back()->with('success', 'Cliente creado con éxito');
        //return redirect(url()->previous())->with('success', 'Cliente creado con éxito');
        return redirect($request->input('previous_url', route('Cliente.index')))
        ->with('success', 'Cliente creado con éxito');
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
        $cliente = Cliente::findOrFail($id);
        return view('Cliente.edit', compact('cliente'));
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
                'CI' => 'required|numeric|digits:7',
                'Nombre' => 'required|string|max:255',
                'Ap_Paterno' => 'required|string|max:255',
                'Ap_Materno' => 'required|string|max:255',
                'Fecha_Nac' => 'required|date|before_or_equal:today',
                'Direccion' => 'required|string|max:255',
                'Telefono' => 'required|numeric|digits:8',
                'Correo' => 'nullable|email',
            ],
            [
                'CI.required' => 'El CI es obligatorio.',
                'CI.numeric' => 'El CI debe ser un valor numérico.',
                'CI.digits' => 'El CI debe tener exactamente 7 dígitos.',
                'Nombre.required' => 'El nombre es obligatorio.',
                'Ap_Paterno.required' => 'El apellido paterno es obligatorio.',
                'Ap_Materno.required' => 'El apellido materno es obligatorio.',
                'Fecha_Nac.required' => 'La fecha de nacimiento es obligatoria.',
                'Fecha_Nac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'Fecha_Nac.before_or_equal' => 'La fecha de nacimiento no debe ser mayor a la fecha actual.',
                'Direccion.required' => 'La dirección es obligatoria.',
                'Telefono.required' => 'El teléfono es obligatorio.',
                'Telefono.numeric' => 'El teléfono debe ser un valor numérico.',
                'Telefono.digits' => 'El teléfono debe tener exactamente 8 dígitos.',
                'Correo.email' => 'El correo electrónico debe ser válido.',
            ]
        );
    
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect('/Cliente')->with('success', 'Cliente actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clientes = Cliente::find($id);
        $clientes->delete();
        return redirect('/Cliente');
    }
}
