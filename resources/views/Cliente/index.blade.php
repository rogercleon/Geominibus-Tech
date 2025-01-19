@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
    <h1>LISTA DE CLIENTES</h1>
@stop

@section('content')
    <a href="Cliente/create" class="btn btn-primary active">REGISTRAR CLIENTES</a>
    <a href="{{ route('Cliente.pdf')}}" class="btn btn-info" style="margin-left: 15px">PDF</a><br><br>
    <table id="clientes" class="table table-striped" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <!--<th scope="col">ID</th>-->
                <th scope="col">CI</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Edad</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Correo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <!--<td>{{$cliente->id}}</td>-->
                    <td>{{$cliente->CI}}</td>
                    <td>{{$cliente->Nombre}} {{$cliente->Ap_Paterno}} {{$cliente->Ap_Materno}}</td>
                    <td>{{ \Carbon\Carbon::parse($cliente->Fecha_Nac)->age }}</td>
                    <td>{{$cliente->Direccion}}</td>
                    <td>{{$cliente->Telefono}}</td>
                    <td>{{$cliente->Correo}}</td>
                    <td>
                        <form action="{{route('Cliente.destroy', $cliente->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/Cliente/{{$cliente->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i> EDITAR</a>
                            @role('Administrador')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i> ELIMINAR</button>
                            @endrole
                        </form>
                    </td>
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
        $(document).ready(function()
        {
            $('#clientes').DataTable({
                "paging": true,         // Activar la paginación
                "ordering": true,       // Activar la ordenación
                "info": true,           // Mostrar información (número de registros)
                "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "Todos"]], // Menú para cambiar el número de registros mostrados
                "searching": true,      // Activar la búsqueda
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
