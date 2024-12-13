<?php

namespace App\Http\Controllers;

use App\Models\Agencia;
use Illuminate\Http\Request;
use App\Models\Buse;
use PDF;

class BusControler extends Controller
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
        $buses = Buse::all();
        $agencias = Agencia::find('id');
        return view('Bus.index', compact('buses', 'agencias'));
        //->with('buses',$buses);
    }

    public function pdf()
    {
        $buses = Buse::paginate();
        $pdf = PDF::loadView('Bus.pdf', ['buses' => $buses]);
        //$pdf->loadHTML('<h2>Reporte de Buses</h2>');
        return $pdf->stream();
        //return View('Bus.pdf', compact('buses'));

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
        return View('Bus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buses = new Buse();
        $buses->Num_Bus = $request->get('Num_Bus');
        $buses->id_agencia = $request->get('id_agencia');
        $buses->Num_Asiento = $request->get('Num_Asiento');

        $buses->save();
        return redirect('/Bus');
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
        $bus = Buse::find($id);
        return view('Bus.edit')->with('bus', $bus);
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
        $buses = Buse::find($id);
        $buses->Num_Bus = $request->get('Num_Bus');
        $buses->id_agencia = $request->get('id_agencia');
        $buses->Num_Asiento = $request->get('Num_Asiento');

        $buses->save();
        return redirect('/Bus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buses = Buse::find($id);
        $buses->delete();
        return redirect('/Bus');
    }
}
