<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agencia;
use PDF;

class AgenciaController extends Controller
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
        $agencias=Agencia::all();
        return view('Agencia.index')->with('agencias',$agencias);
    }

    public function pdf()
    {
        $agencias=Agencia::paginate();
        $pdf = PDF::loadView('Agencia.pdf',['agencias'=>$agencias]);
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
        return View('Agencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agencias=new Agencia();
        $agencias->Agencia=$request->get('Agencia');

        $agencias->save();
        return redirect('/Agencia');
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
        $agencia=Agencia::find($id);
        return view('Agencia.edit')->with('agencia',$agencia);
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
        $agencias=Agencia::find($id);
        $agencias->Agencia=$request->get('Agencia');

        $agencias->save();
        return redirect('/Agencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agencias= Agencia::find($id);
        $agencias->delete();
        return redirect('/Agencia');
    }
}
