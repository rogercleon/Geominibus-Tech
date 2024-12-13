<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minibuse;
use PDF;

class MinibusController extends Controller
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
        $minibuses = Minibuse::all();
        return view('Minibus.index', compact('minibuses'));
    }

    public function pdf()
    {
        $minibuses = Minibuse::paginate();
        $pdf = PDF::loadView('Minibus.pdf', ['minibuses' => $minibuses]);

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
        return View('Minibus.create');
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
                'Num_Asientos' => 'required|integer|min:1',
                'Num_Minibus' => 'required|integer|min:1|max:99',
                'Num_Chasis' => [
                    'required',
                    'string',
                    'regex:/^[A-HJ-NPR-Z0-9]{17}$/',
                ],
                'Placa' => [
                    'required',
                    'string',
                    'regex:/^[0-9]{4}[A-Z]{3}$/',
                ],
            ],

            [
                'Num_Asientos.required' => 'El número de asientos es obligatorio.',
                'Num_Asientos.integer' => 'El número de asientos debe ser un valor entero.',
                'Num_Asientos.min' => 'El número de asientos debe ser mayor a 0.',
                'Num_Minibus.required' => 'El número de minibus es obligatorio.',
                'Num_Minibus.integer' => 'El número de minibus debe ser un valor entero.',
                'Num_Minibus.min' => 'El número de minibus debe ser mayor a 0.',
                'Num_Minibus.max' => 'El número de minibus debe ser menor a 100.',
                'Num_Chasis.required' => 'El número de chasis es obligatorio.',
                'Num_Chasis.string' => 'El número de chasis debe ser una cadena de caracteres.',
                'Num_Chasis.regex' => 'El número de chasis debe seguir el formato del VIN (17 caracteres alfanuméricos).',
                'Placa.string' => 'La placa debe ser una cadena de caracteres.',
                'Placa.regex' => 'La placa debe seguir el formato 0000AAA.',
            ]
        );

        Minibuse::create($request->only(['Num_Minibus', 'Num_Asientos', 'Num_Chasis', 'Placa']));
        return redirect('/Minibus')->with('success', 'Minibus creado con éxito');
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
        $minibus = Minibuse::find($id);
        return view('Minibus.edit')->with('minibus', $minibus);
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
        $request->validate([
            'Num_Asientos' => 'required|integer|min:1',
            'Num_Minibus' => 'required|integer|min:1|max:99',
            'Num_Chasis' => [
                'required',
                'string',
                'regex:/^[A-HJ-NPR-Z0-9]{17}$/',
            ],
            'Placa' => [
                'required',
                'string',
                'regex:/^[0-9]{4}[A-Z]{3}$/',
            ],
        ], [
            'Num_Asientos.required' => 'El número de asientos es obligatorio.',
            'Num_Asientos.integer' => 'El número de asientos debe ser un valor entero.',
            'Num_Asientos.min' => 'El número de asientos debe ser mayor a 0.',
            'Num_Minibus.required' => 'El número de minibus es obligatorio.',
            'Num_Minibus.integer' => 'El número de minibus debe ser un valor entero.',
            'Num_Minibus.min' => 'El número de minibus debe ser mayor a 0.',
            'Num_Minibus.max' => 'El número de minibus debe ser menor a 100.',
            'Num_Chasis.required' => 'El número de chasis es obligatorio.',
            'Num_Chasis.string' => 'El número de chasis debe ser una cadena de caracteres.',
            'Num_Chasis.regex' => 'El número de chasis debe seguir el formato del VIN (17 caracteres alfanuméricos).',
            'Placa.string' => 'La placa debe ser una cadena de caracteres.',
            'Placa.regex' => 'La placa debe seguir el formato 0000AAA.',
        ]);

        $minibus = Minibuse::findOrFail($id);
        $minibus->update($request->only(['Num_Minibus', 'Num_Asientos', 'Num_Chasis', 'Placa']));
        return redirect('/Minibus')->with('success', 'Minibus actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $minibuses = Minibuse::find($id);
        $minibuses->delete();
        return redirect('/Minibus');
    }
}
