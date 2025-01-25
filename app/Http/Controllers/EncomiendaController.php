<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleEncomienda;
use App\Models\Encomienda;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EncomiendaController extends Controller
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
        $encomiendas = Encomienda::all();
        return view('Encomienda.index', compact('encomiendas'));
    }

    public function pdf()
    {
        $encomiendas = Encomienda::paginate();
        $pdf = PDF::loadView('Encomienda.pdf', ['encomiendas' => $encomiendas]);

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
        $clientes = Cliente::all();
        $horarios = Horario::all();

        return view('Encomienda.create', compact('clientes', 'horarios'));
        //return View('Encomienda.create');
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
                'id_horario' => 'required|numeric',
                'id_emisor' => 'required|numeric',
                'id_receptor' => 'required|numeric',
                'Fecha_Env' => 'required|date|after_or_equal:today',
                'Fecha_Rec' => 'required|date|after_or_equal:today',
                'PrecioTotal' => 'required|numeric|gt:0',
                'detalles' => 'required|array',
                'detalles.*.Descripcion' => 'required|string',
                'detalles.*.Cantidad' => 'required|numeric|gt:0',
                'detalles.*.Peso' => 'required|numeric|gt:0',
                'detalles.*.Precio' => 'required|numeric|gt:0',
            ],
            [
                'id_horario.required' => 'El campo "Horario" es obligatorio.',
                'id_horario.numeric' => 'El campo "Horario" debe ser un número válido.',
                'id_emisor.required' => 'El campo "Emisor" es obligatorio.',
                'id_emisor.numeric' => 'El campo "Emisor" debe ser un número válido.',
                'id_receptor.required' => 'El campo "Receptor" es obligatorio.',
                'id_receptor.numeric' => 'El campo "Receptor" debe ser un número válido.',
                'Fecha_Env.required' => 'El campo "Fecha de Envío" es obligatorio.',
                'Fecha_Env.date' => 'El campo "Fecha de Envío" debe ser una fecha válida.',
                'Fecha_Env.after_or_equal' => 'La "Fecha de Envío" debe ser igual o posterior a la fecha actual.',
                'Fecha_Rec.required' => 'El campo "Fecha de Recepción" es obligatorio.',
                'Fecha_Rec.date' => 'El campo "Fecha de Recepción" debe ser una fecha válida.',
                'Fecha_Rec.after_or_equal' => 'La "Fecha de Recepción" debe ser igual o posterior a la fecha actual.',
                'PrecioTotal.required' => 'El campo "Precio Total" es obligatorio.',
                'PrecioTotal.numeric' => 'El campo "Precio Total" debe ser un número.',
                'PrecioTotal.gt' => 'El "Precio Total" debe ser mayor que 0.',
                'detalles.required' => 'Debe ingresar al menos un detalle.',
                'detalles.array' => 'Los detalles deben ser un array.',
                'detalles.*.Descripcion.required' => 'El campo "Descripción" es obligatorio en cada detalle.',
                'detalles.*.Descripcion.string' => 'El campo "Descripción" debe ser una cadena de texto.',
                'detalles.*.Cantidad.required' => 'El campo "Cantidad" es obligatorio en cada detalle.',
                'detalles.*.Cantidad.numeric' => 'El campo "Cantidad" debe ser un número.',
                'detalles.*.Cantidad.gt' => 'La "Cantidad" debe ser mayor a 0.',
                'detalles.*.Peso.required' => 'El campo "Peso" es obligatorio en cada detalle.',
                'detalles.*.Peso.numeric' => 'El campo "Peso" debe ser un número.',
                'detalles.*.Peso.gt' => 'El "Peso" debe ser mayor a 0.',
                'detalles.*.Precio.required' => 'El campo "Precio" es obligatorio en cada detalle.',
                'detalles.*.Precio.numeric' => 'El campo "Precio" debe ser un número.',
                'detalles.*.Precio.gt' => 'El "Precio" debe ser mayor a 0.',
            ]
        );

        // Crear la encomienda
        $encomienda = Encomienda::create([
            'id_emisor' => $request->id_emisor,
            'id_receptor' => $request->id_receptor,
            'Fecha_Env' => $request->Fecha_Env,
            'Fecha_Rec' => $request->Fecha_Rec,
            'id_horario' => $request->id_horario,
            'Estado' => 'Enviado',
            'PrecioTotal' => $request->PrecioTotal,
        ]);

        // Insertar los detalles de la encomienda
        foreach ($request->detalles as $detalle) {
            DetalleEncomienda::create([
                'id_encomienda' => $encomienda->id,
                'Descripcion' => $detalle['Descripcion'],
                'Cantidad' => $detalle['Cantidad'],
                'Peso' => $detalle['Peso'],
                'Precio' => $detalle['Precio'],
            ]);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('Encomienda.index')->with('success', 'Encomienda registrada exitosamente.');
    }


    public function ActualizarEstado(Request $request, $id)
    {
        // Validar que el estado sea uno de los permitidos
        $request->validate([
            'estado' => 'required|in:Enviado,Recepcionado,Entregado',
        ]);

        // Buscar la encomienda y actualizar el estado
        $encomienda = Encomienda::findOrFail($id);
        $encomienda->Estado = $request->estado;
        $encomienda->save();

        return response()->json(['success' => true, 'message' => 'Estado actualizado correctamente.']);
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
        $encomienda = Encomienda::with('detalles')->findOrFail($id);
        $clientes = Cliente::all();
        $horarios = Horario::with('ruta')->get();

        return view('Encomienda.edit', compact('encomienda', 'clientes', 'horarios'));
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
            'id_horario' => 'required|numeric',
            'id_emisor' => 'required|numeric',
            'id_receptor' => 'required|numeric',
            'Fecha_Env' => 'required|date|after_or_equal:today',
            'Fecha_Rec' => 'required|date|after_or_equal:today',
            'PrecioTotal' => 'required|numeric|gt:0',
            'detalles' => 'required|array',
            'detalles.*.Descripcion' => 'required|string',
            'detalles.*.Cantidad' => 'required|numeric|gt:0',
            'detalles.*.Peso' => 'required|numeric|gt:0',
            'detalles.*.Precio' => 'required|numeric|gt:0',
        ]);

        $encomienda = Encomienda::findOrFail($id);

        $encomienda->update([
            'id_emisor' => $request->id_emisor,
            'id_receptor' => $request->id_receptor,
            'id_horario' => $request->id_horario,
            'Fecha_Env' => $request->Fecha_Env,
            'Fecha_Rec' => $request->Fecha_Rec,
            'PrecioTotal' => $request->PrecioTotal,
        ]);

        $encomienda->detalles()->delete();

        foreach ($request->detalles as $detalle) {
            $encomienda->detalles()->create($detalle);
        }

        return redirect()->route('Encomienda.index')->with('success', 'Encomienda actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $encomienda = Encomienda::find($id);
        $encomienda->delete();
        return redirect('/Encomienda');
    }
}
