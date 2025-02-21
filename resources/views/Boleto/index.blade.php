@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<h1>LISTA DE BOLETOS</h1>
@stop

@section('content')
@role('Administrador|Vendedor')
<a href="{{ route('Boleto.pdf')}}" class="btn btn-info" style="margin-left: 15px">PDF</a><br><br>
@endrole
<table id="boletos" class="table table-striped" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Ver</th>
            <th scope="col">Cliente</th>
            <th scope="col">Destino</th>
            <th scope="col">N° Minibús</th>
            <th scope="col">Fecha</th>
            <th scope="col">Hora</th>
            <th scope="col">N° Asiento</th>
            <th scope="col">Precio</th>
            @role('Administrador|Vendedor')
            <th scope="col">Acciones</th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach($boletos as $boleto)
        <tr>
            <td>
                <!--<a href="{{ route('Boleto.pdfMinibus', $boleto->horario->asignarMinibus->minibus->id) }}" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                </a>-->
                <a href="{{ route('Boleto.pdfMinibus', $boleto->horario->id) }}" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                </a>
            </td>
            <td>{{$boleto->cliente->Nombre}} {{$boleto->cliente->Ap_Paterno}} {{$boleto->cliente->Ap_Materno}}</td>
            <td>{{$boleto->horario->ruta->Origen}} - {{$boleto->horario->ruta->Destino}}</td>
            <td>Minibús {{$boleto->horario->asignarMinibus->minibus->Num_Minibus}}</td>
            <td>{{$boleto->horario->Fecha}}</td>
            <td>{{$boleto->horario->Hora}}</td>
            <td>Asiento {{$boleto->Asiento}}</td>
            <td>Bs {{number_format($boleto->Precio, 2, ',', '.') }}</td>
            @role('Administrador|Vendedor')
            <td>
                <form action="{{route('Boleto.destroy',$boleto->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/Boleto/{{$boleto->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i> EDITAR</a>
                    @role('Administrador')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ELIMINAR</button>
                    @endrole
                </form>
            </td>
            @endrole
        </tr>
        @endforeach
    </tbody>
</table>
<br><br>
@stop

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#boletos').DataTable({
            "paging": true, // Activar la paginación
            "ordering": true, // Activar la ordenación
            "info": true, // Mostrar información (número de registros)
            "lengthMenu": [
                [5, 10, 50, -1],
                [5, 10, 50, "Todos"]
            ], // Menú para cambiar el número de registros mostrados
            "searching": true, // Activar la búsqueda
            "language": {
                "sEmpty": "No hay registros disponibles", // Mensaje cuando no hay registros
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros", // Información de registros mostrados
                "sInfoEmpty": "Mostrando 0 a 0 de 0 registros", // Cuando no hay registros
                "sInfoFiltered": "(filtrado de _MAX_ registros totales)", // Información de registros filtrados
                "sLengthMenu": "Mostrar _MENU_ registros", // Menú de cantidad de registros
                "sLoadingRecords": "Cargando...", // Mensaje mientras carga
                "sProcessing": "Procesando...", // Mensaje mientras procesa
                "sSearch": "Buscar:", // Etiqueta de la barra de búsqueda
                "sZeroRecords": "No se encontraron registros coincidentes", // Mensaje cuando no hay resultados de búsqueda
                "oPaginate": {
                    "sNext": "Siguiente", // Botón de siguiente página
                    "sPrevious": "Anterior", // Botón de página anterior
                    "sFirst": "Primero", // Botón de primera página
                    "sLast": "Último" // Botón de última página
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente", // Mensaje de orden ascendente
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente" // Mensaje de orden descendente
                }
            }
        });
    });
</script>
@stop