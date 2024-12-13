<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Location;
use App\Models\Localizacion;
use Mapper;
use PDF;

class MapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function mapMarker()
    {
        $locations = Location::all();
        $map_markes = array ();
        foreach ($locations as $key => $location) {
            $map_markes[] = (object)array(
                'location_title' => $location->location_title,
                'coords_lat' => $location->coords_lat,
                'coords_lng' => $location->coords_lng,
                'number' => $location->number,
                'location_email' => $location->location_email,
                'addressline1' => $location->addressline1,
                'addressline2' => $location->addressline2,
                'city' => $location->city,
                'country' => $location->country,
            );
        }
        return response()->json($map_markes);
    }*/

    public function mapMarker()
    {
        $localizaciones = Localizacion::all();
        $map_markes = array ();
        foreach ($localizaciones as $key => $localizacion)
        {
            $map_markes[] = (object)array(
                'Latitud' => $localizacion->Latitud,
                'Longitud' => $localizacion->Longitud,
                'Fecha' => $localizacion->Fecha,
            );
        }
        return response()->json($map_markes);
    }
    public function index()
    {
        //Mapper::map(-17.4450948, -66.1294288, ['eventBeforeLoad' => 'console.log("before load");']);
        //Mapper::map(-17.4450948, -66.1294288)->informationWindow(-17.4450948, -66.1294288, 'Content', ['markers' => ['animation' => 'DROP']]);
        $localizaciones=Localizacion::all();

        Mapper::map(-17.4450948, -66.1294288, ['zoom' => 14]);
        return View('Mapa.index', compact('localizaciones'));
    }

    public function pdf()
    {
        $localizaciones=Localizacion::paginate();
        $pdf = PDF::loadView('Mapa.pdf',['localizaciones'=>$localizaciones]);
        //$pdf->loadHTML('<h2>Reporte de Buses</h2>');
        return $pdf->stream();
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
