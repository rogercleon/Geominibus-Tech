<?php

namespace App\Http\Controllers;

use App\Models\Ruta;
use Illuminate\Http\Request;
use PDF;

class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //$this->middleware('permission:ver-ruta | crear-ruta | editar-ruta | borrar-ruta', ['only' => ['index']]);
        //$this->middleware('permission:crear-ruta', ['only' => ['create', 'store']]);
        //$this->middleware('permission:editar-ruta', ['only' => ['edit', 'update']]);
        //$this->middleware('permission:borrar-ruta', ['only' => ['destroy']]);

        $this->middleware('auth');
    }

    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $rutas = Ruta::all();
        return view('Ruta.index', compact('rutas'));
    }

    public function pdf()
    {
        $rutas = Ruta::paginate();
        $pdf = PDF::loadView('Ruta.pdf', ['rutas' => $rutas]);

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
        return View('Ruta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Origen' => 'required|string',
            'Destino' => 'required|string',
            'Precio' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
        ], [
            'Precio.required' => 'El precio es obligatorio.',
            'Precio.numeric' => 'El precio debe ser un número válido.',
            'Precio.min' => 'El precio debe ser mayor a 0.',
            'Precio.regex' => 'El precio debe tener máximo 2 decimales.',
        ]);

        Ruta::create([
            'Origen' => $request->Origen,
            'Destino' => $request->Destino,
            'Precio' => $request->Precio,
        ]);

        return redirect('/Ruta')->with('success', 'Ruta registrada correctamente');
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
        $ruta = Ruta::find($id);
        return view('Ruta.edit')->with('ruta', $ruta);
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
            'Origen' => 'required|string',
            'Destino' => 'required|string',
            'Precio' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
        ], [
            'Precio.required' => 'El precio es obligatorio.',
            'Precio.numeric' => 'El precio debe ser un número válido.',
            'Precio.min' => 'El precio debe ser mayor a 0.',
            'Precio.regex' => 'El precio debe tener máximo 2 decimales.',
        ]);

        $ruta = Ruta::findOrFail($id);
        $ruta->Origen = $request->Origen;
        $ruta->Destino = $request->Destino;
        $ruta->Precio = number_format($request->Precio, 2, '.', '');
        $ruta->save();

        return redirect('/Ruta')->with('success', 'Ruta actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rutas = Ruta::find($id);
        $rutas->delete();
        return redirect('/Ruta');
    }
}
