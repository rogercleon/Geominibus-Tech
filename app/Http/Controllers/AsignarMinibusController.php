<?php

namespace App\Http\Controllers;

use App\Models\AsignarMinibuse;
use App\Models\Conductore;
use App\Models\Minibuse;
use Illuminate\Http\Request;
use PDF;

class AsignarMinibusController extends Controller
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
        //$asignarminibuses = AsignarMinibuse::all();
        //return view('AsignarMinibus.index', compact('asignarminibuses'));

        $asignarminibuses = AsignarMinibuse::with(['minibus', 'conductor'])->get();
        return view('AsignarMinibus.index', compact('asignarminibuses'));
    }

    public function pdf()
    {
        //$asignarminibuses = AsignarMinibuse::paginate();
        //$pdf = PDF::loadView('AsignarMinibus.pdf', ['asignarminibuses' => $asignarminibuses]);
        //return $pdf->stream();

        $asignarminibuses = AsignarMinibuse::with('conductor', 'minibus')->get();
        $pdf = PDF::loadView('AsignarMinibus.pdf', compact('asignarminibuses'));
        return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return View('AsignarMinibus.create');

        $minibuses = Minibuse::all();
        $conductores = Conductore::all();

        return view('AsignarMinibus.create', compact('minibuses', 'conductores'));
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
            'id_minibus' => 'required|exists:minibuses,id',
            'id_conductor' => 'required|exists:conductores,id',
        ]);

        AsignarMinibuse::create($request->only(['id_minibus', 'id_conductor']));

        return redirect()->route('AsignarMinibus.index')->with('success', 'Asignación creada con éxito.');
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
        $asignarminibus = AsignarMinibuse::findOrFail($id);
        $conductores = Conductore::all();
        $minibuses = Minibuse::all();

        // Pasar los datos a la vista
        return view('AsignarMinibus.edit', compact('asignarminibus', 'conductores', 'minibuses'));
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
            'id_conductor' => 'required|exists:conductores,id',
            'id_minibus' => 'required|exists:minibuses,id',
        ], [
            'id_conductor.required' => 'El conductor es obligatorio.',
            'id_minibus.required' => 'El minibús es obligatorio.',
        ]);

        $asignarminibus = AsignarMinibuse::findOrFail($id);
        $asignarminibus->update([
            'id_conductor' => $request->id_conductor,
            'id_minibus' => $request->id_minibus,
        ]);

        return redirect('/AsignarMinibus')->with('success', 'Asignación de minibús actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $asignarminibus = AsignarMinibuse::find($id);
        $asignarminibus->delete();
        return redirect('/AsignarMinibus');
    }
}
