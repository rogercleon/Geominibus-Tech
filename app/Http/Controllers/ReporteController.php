<?php

namespace App\Http\Controllers;

use App\Models\Boleto;
use App\Models\Cliente;
use App\Models\Conductore;
use App\Models\Encomienda;
use App\Models\Horario;
use App\Models\Minibuse;
use App\Models\Ruta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Reportes.index');
    }

    public function mostrarFiltro()
    {
        return view('Reportes.filtrar');
    }

    public function generarReporte(Request $request)
    {
        $tipo = $request->tipo; // 'clientes' o 'conductores'
        $edadMinima = $request->edad_minima;

        if ($tipo == 'clientes') {
            $registros = Cliente::all()->filter(function ($cliente) use ($edadMinima) {
                return Carbon::parse($cliente->Fecha_Nac)->age >= $edadMinima;
            });

            $pdf = PDF::loadView('Reportes.Rep_Clientes', ['registros' => $registros]);
            $pdf->setPaper('A4', 'portrait'); // Configura el tamaño y la orientación de la hoja

            return $pdf->stream('Reporte_Clientes.pdf');
        } else {
            $registros = Conductore::all()->filter(function ($conductor) use ($edadMinima) {
                return Carbon::parse($conductor->Fecha_Nac)->age >= $edadMinima;
            });

            $pdf = PDF::loadView('Reportes.Rep_Conductores', ['registros' => $registros]);
            $pdf->setPaper('A4', 'portrait'); // Configura el tamaño y la orientación de la hoja

            return $pdf->stream('Reporte_Conductores.pdf');
        }

        $view = $tipo == 'clientes' ? 'Reportes.Rep_Clientes' : 'Reportes.Rep_Conductores';

        return view($view, compact('registros'));
    }

    public function generarReporteMinibus(Request $request)
    {
        $minibusId = $request->minibus; // ID del minibus seleccionado

        // Obtenemos el minibus y los datos del conductor asignado
        $minibus = Minibuse::find($minibusId);
        $conductor = null;

        if ($minibus) {
            $asignacion = $minibus->asignaciones()->first(); // Relación con "asignar_minibuses"
            if ($asignacion) {
                $conductor = $asignacion->conductor; // Obtenemos el conductor relacionado
            }
        }

        $pdf = PDF::loadView('Reportes.Rep_Minibuses', [
            'minibus' => $minibus,
            'conductor' => $conductor,
        ]);
        $pdf->setPaper('A4', 'portrait'); // Configura el tamaño y orientación

        return $pdf->stream('Reporte_Minibuses.pdf');
    }

    public function generarReporteHorarios(Request $request)
    {
        // Obtenemos los filtros desde la solicitud
        $rutaId = $request->input('ruta');
        $fecha = $request->input('fecha');

        // Filtramos los horarios según la ruta y la fecha seleccionadas
        $horarios = Horario::where('id_ruta', $rutaId)
            ->when($fecha, function ($query, $fecha) {
                return $query->where('Fecha', $fecha);
            })
            ->with(['ruta', 'asignarMinibus.minibus', 'asignarMinibus.conductor'])
            ->get();

        // Cargamos la vista del reporte con los datos filtrados
        $pdf = PDF::loadView('Reportes.Rep_Horarios', [
            'horarios' => $horarios,
        ]);
        $pdf->setPaper('A4', 'portrait'); // Configuramos el tamaño y orientación

        return $pdf->stream('Reporte_Horarios.pdf');
    }

    public function generarReporteBoletos(Request $request)
    {
        // Obtenemos el cliente seleccionado desde el formulario
        $clienteId = $request->input('cliente');

        // Filtramos los boletos asociados al cliente
        $boletos = Boleto::where('id_cliente', $clienteId)
            ->with(['horario.ruta', 'horario.asignarMinibus.minibus'])
            ->get();

        // Obtenemos el cliente para mostrar en el reporte
        $cliente = Cliente::find($clienteId);

        // Generamos el PDF del reporte
        $pdf = PDF::loadView('Reportes.Rep_Boletos', [
            'boletos' => $boletos,
            'cliente' => $cliente,
        ]);
        $pdf->setPaper('A4', 'portrait'); // Configuramos el tamaño y orientación

        return $pdf->stream('Reporte_Boletos.pdf');
    }

    public function generarReporteEncomiendas(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'ruta' => 'required|exists:rutas,id',
            'fecha' => 'required|date',
        ]);

        $rutaId = $request->input('ruta');
        $fecha = $request->input('fecha');

        // Filtramos las encomiendas por la ruta y fecha
        $encomiendas = Encomienda::whereHas('horario', function ($query) use ($rutaId, $fecha) {
            $query->where('id_ruta', $rutaId)->where('Fecha_Env', $fecha);
        })
            ->with(['emisor', 'receptor', 'horario.ruta'])
            ->get();

        // Generamos el PDF con los datos
        $pdf = PDF::loadView('Reportes.Rep_Encomienda', [
            'encomiendas' => $encomiendas,
            'fecha' => $fecha,
            'ruta' => Ruta::find($rutaId),
        ]);
        $pdf->setPaper('A4', 'portrait'); // Configuración del tamaño de la hoja y orientación

        return $pdf->stream('Reporte_Encomiendas.pdf');
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
