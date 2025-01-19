<?php

namespace App\Http\Controllers;

use App\Models\AsignarMinibuse;
use App\Models\Horario;
use App\Models\Ruta;
use Illuminate\Http\Request;

use PDF;

class HorarioController extends Controller
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
        $horarios = Horario::all();
        return view('Horario.index', compact('horarios'));
    }

    public function pdf()
    {
        //$horarios = Horario::paginate();
        //$pdf = PDF::loadView('Horario.pdf', ['horarios' => $horarios]);
        //return $pdf->stream();

        $horarios = Horario::with(['ruta', 'asignarMinibus.minibus', 'asignarMinibus.conductor'])->get();
        $pdf = PDF::loadView('Horario.pdf', ['horarios' => $horarios]);
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return View('Horario.create');

        $rutas = Ruta::all();
        $asignaciones = AsignarMinibuse::with('minibus', 'conductor')->get();
        return view('Horario.create', compact('rutas', 'asignaciones'));
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
                'id_ruta' => 'required|exists:rutas,id',
                'id_minibus' => 'required|exists:asignar_minibuses,id',
                'Fecha' => 'required|date|after_or_equal:today',
                'Hora' => [
                    'required',
                    'date_format:H:i',
                ],
            ],
            [
                'id_ruta.required' => 'La ruta es obligatoria.',
                'id_ruta.exists' => 'La ruta seleccionada no existe.',
                'id_minibus.required' => 'La asignación de minibús es obligatoria.',
                'id_minibus.exists' => 'La asignación de minibús seleccionada no existe.',
                'Fecha.required' => 'La fecha es obligatoria.',
                'Fecha.date' => 'La fecha debe ser válida.',
                'Fecha.after_or_equal' => 'La fecha debe ser hoy o posterior.',
                'Hora.required' => 'La hora es obligatoria.',
                'Hora.date_format' => 'La hora debe estar en el formato HH:mm.',
            ]
        );

        Horario::create($request->only(['id_ruta', 'id_minibus', 'Fecha', 'Hora']));
        //return redirect('/Horario')->with('success', 'Horario creado con éxito');
        return redirect($request->input('previous_url', route('Horario.index')))
        ->with('success', 'Horario creado con éxito');
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
        $horario = Horario::findOrFail($id);
        $rutas = Ruta::all();
        $asignaciones = AsignarMinibuse::with('minibus', 'conductor')->get();

        return view('horario.edit', compact('horario', 'rutas', 'asignaciones'));
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
        $horario = Horario::findOrFail($id);
        $request->validate(
            [
                'id_ruta' => 'required|exists:rutas,id',
                'id_minibus' => 'required|exists:asignar_minibuses,id',
                //'Fecha' => 'required|date|after_or_equal:today',
                'Hora' => [
                    'required',
                    'date_format:H:i',
                ],
            ],
            [
                'id_ruta.required' => 'La ruta es obligatoria.',
                'id_ruta.exists' => 'La ruta seleccionada no existe.',
                'id_minibus.required' => 'La asignación de minibús es obligatoria.',
                'id_minibus.exists' => 'La asignación de minibús seleccionada no existe.',
                //'Fecha.required' => 'La fecha es obligatoria.',
                //'Fecha.date' => 'La fecha debe ser válida.',
                //'Fecha.after_or_equal' => 'La fecha debe ser hoy o posterior.',
                'Hora.required' => 'La hora es obligatoria.',
                'Hora.date_format' => 'La hora debe estar en el formato HH:mm.',
            ]
        );

        $horario->update($request->only(['id_ruta', 'id_minibus', 'Fecha', 'Hora']));
        return redirect('/Horario')->with('success', 'Horario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horarios = Horario::find($id);
        $horarios->delete();
        return redirect('/Horario');
    }
}
