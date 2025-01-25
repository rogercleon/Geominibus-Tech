<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Minibuse;
use App\Models\Monitoreo;
use Illuminate\Support\Facades\DB;

class MapBoxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $minibuses = Minibuse::all();
        return view('Mapa2.index', compact('minibuses'));
    }

    public function getCoordinates($id)
    {
        $coordinates = Monitoreo::where('id_minibus', $id)->get(['Latitud', 'Longitud']);
        return response()->json($coordinates);
    }

    public function obtenerDatosMinibus($id)
    {
        $asignacion = DB::table('asignar_minibuses')
            ->join('minibuses', 'asignar_minibuses.id_minibus', '=', 'minibuses.id')
            ->join('conductores', 'asignar_minibuses.id_conductor', '=', 'conductores.id')
            ->select(
                'minibuses.Num_Minibus',
                'minibuses.Placa',
                'conductores.Nombre',
                'conductores.Ap_Paterno',
                'conductores.Ap_Materno'
            )
            ->where('minibuses.id', $id)
            ->first();

        if ($asignacion) {
            return response()->json($asignacion);
        } else {
            return response()->json(['error' => 'No se encontró información para este minibús.'], 404);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
