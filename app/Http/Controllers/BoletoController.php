<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use App\Models\Cliente;
use App\Models\Horario;
use Illuminate\Http\Request;
use PDF;

class BoletoController extends Controller
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
        $boletos = Boleto::all();
        return view('Boleto.index', compact('boletos'));
    }
    public function pdf()
    {

        $boletos = Boleto::with(['cliente', 'horario.ruta', 'horario.asignarMinibus.minibus'])->get();
        $pdf = PDF::loadView('Boleto.pdf', ['boletos' => $boletos]);
        return $pdf->stream();
    }
    public function pdfMinibus($horarioId)
    {
        //$boletos = Boleto::where('horario_id', $horarioId)
        //    ->with(['cliente', 'horario.ruta', 'horario.asignarMinibus.minibus'])
        //    ->get();

        $boletos = Boleto::where('id_horario', $horarioId)
            ->with(['cliente', 'horario.ruta', 'horario.asignarMinibus.minibus']) // Cargamos las relaciones necesarias
            ->get();

        $pdf = PDF::loadView('Boleto.pdfMinibus', ['boletos' => $boletos]);

        // Devolver el PDF generado como stream
        return $pdf->stream();
    }
    /*public function pdfMinibus($horarioId)
    {
        $boletos = Boleto::whereHas('horario', function ($query) use ($horarioId) {
            $query->where('id', $horarioId);
        })->with(['cliente', 'horario.ruta', 'horario.asignarMinibus.minibus'])->get();
        $pdf = PDF::loadView('Boleto.pdfMinibus', ['boletos' => $boletos]);

        return $pdf->stream();
    }
    public function pdfMinibus($minibusId)
    {
        $boletos = Boleto::whereHas('horario.asignarMinibus.minibus', function ($query) use ($minibusId) {
            $query->where('id', $minibusId);
        })->with(['cliente', 'horario.ruta', 'horario.asignarMinibus.minibus'])->get();
        $pdf = PDF::loadView('Boleto.pdfMinibus', ['boletos' => $boletos]);

        return $pdf->stream();
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_horario)
    {
        $horario = Horario::findOrFail($id_horario);
        $clientes = Cliente::all();
        $asientosOcupados = Boleto::where('id_horario', $horario->id)->pluck('Asiento')->toArray();
        return view('Boleto.create', compact('asientosOcupados', 'horario', 'clientes'));
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
                'id_cliente' => 'required|exists:clientes,id',
                'id_horario' => 'required|exists:horarios,id',
                'Asiento' => 'required|integer|min:1',
                'Precio' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
            ],
            [
                'id_cliente.required' => 'El CI es obligatorio.',
                'id_cliente.exists' => 'El CI seleccionado no existe.',
                'id_horario.required' => 'El horario es obligatorio.',
                'id_horario.exists' => 'El horario seleccionado no existe.',
                'Asiento.required' => 'El número de asiento es obligatorio.',
                'Asiento.integer' => 'El número de asiento debe ser un valor numérico.',
                'Asiento.min' => 'El número de asiento debe ser mayor a 0.',
                'Precio.required' => 'El precio es obligatorio.',
                'Precio.numeric' => 'El precio debe ser un número válido.',
                'Precio.min' => 'El precio debe ser mayor a 0.',
                'Precio.regex' => 'El precio debe tener máximo 2 decimales.',
            ]
        );
        Boleto::create([
            'id_cliente' => $request->id_cliente,
            'id_horario' => $request->id_horario,
            'Asiento' => $request->Asiento,
            'Precio' => $request->Precio,
        ]);

        return redirect()->route('Boleto.index')->with('success', 'Boleto comprado con éxito');
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
        $boleto = Boleto::findOrFail($id);
        $horario = $boleto->horario;
        $clientes = Cliente::all();
        $asientosOcupados = Boleto::where('id_horario', $horario->id)->pluck('Asiento')->toArray();

        return view('Boleto.edit', compact('boleto', 'horario', 'clientes', 'asientosOcupados'));
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
                'id_cliente' => 'required|exists:clientes,id',
                'id_horario' => 'required|exists:horarios,id',
                'Asiento' => 'required|integer|min:1',
                'Precio' => 'required|numeric|min:0.01|regex:/^\d+(\.\d{1,2})?$/',
            ],
            [
                'id_cliente.required' => 'El CI es obligatorio.',
                'id_cliente.exists' => 'El CI seleccionado no existe.',
                'id_horario.required' => 'El horario es obligatorio.',
                'id_horario.exists' => 'El horario seleccionado no existe.',
                'Asiento.required' => 'El número de asiento es obligatorio.',
                'Asiento.integer' => 'El número de asiento debe ser un valor numérico.',
                'Asiento.min' => 'El número de asiento debe ser mayor a 0.',
                'Precio.required' => 'El precio es obligatorio.',
                'Precio.numeric' => 'El precio debe ser un número válido.',
                'Precio.min' => 'El precio debe ser mayor a 0.',
                'Precio.regex' => 'El precio debe tener máximo 2 decimales.',
            ]
        );

        $boleto = Boleto::findOrFail($id);
        $boleto->id_cliente = $request->id_cliente;
        $boleto->id_horario = $request->id_horario;
        $boleto->Asiento = $request->Asiento;
        $boleto->Precio = $request->Precio;
        $boleto->save();

        return redirect()->route('Boleto.index')->with('success', 'Boleto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $boletos = Boleto::find($id);
        $boletos->delete();
        return redirect('/Boleto');
    }
}
