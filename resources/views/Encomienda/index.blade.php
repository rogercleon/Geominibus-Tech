@extends('adminlte::page')

@section('title', 'Sistema de Gestión y Monitoreo "Geominibus Tech"')

@section('content_header')
<h1>LISTA DE ENCOMIENDAS</h1>
@stop

@section('content')
@role('Administrador|Vendedor')
<a href="Encomienda/create" class="btn btn-primary active">REGISTRAR ENCOMIENDAS</a>
<a href="{{ route('Encomienda.pdf')}}" class="btn btn-info" style="margin-left: 15px">PDF</a><br><br>
@endrole
<table id="encomiendas" class="table table-striped" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Emisor</th>
            <th scope="col">Receptor</th>
            <th scope="col">Ruta</th>
            <!--<th scope="col">Fecha Env</th>
            <th scope="col">Fecha Rec</th>-->
            <th scope="col">Estado</th>
            <th scope="col">Precio</th>
            @role('Administrador|Vendedor')
            <th scope="col">Acciones</th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach($encomiendas as $encomienda)
        <tr>
            <td>{{$encomienda->emisor->Nombre}} {{$encomienda->emisor->Ap_Paterno}}</td>
            <td>{{$encomienda->receptor->Nombre}} {{$encomienda->receptor->Ap_Paterno}}</td>
            <td>{{$encomienda->horario->ruta->Origen}} - {{$encomienda->horario->ruta->Destino}}</td>
            <!--<td>{{$encomienda->Fecha_Env}}</td>
            <td>{{$encomienda->Fecha_Rec}}</td>-->
            <td>
                <select class="form-select estado-select" data-id="{{ $encomienda->id }}">
                    <option value="Enviado" {{ $encomienda->Estado == 'Enviado' ? 'selected' : '' }}>Enviado</option>
                    <option value="Recepcionado" {{ $encomienda->Estado == 'Recepcionado' ? 'selected' : '' }}>Recepcionado</option>
                    <option value="Entregado" {{ $encomienda->Estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
                @role('Administrador|Vendedor')
                <button class="btn btn-primary btn-guardar-estado" data-id="{{ $encomienda->id }}">
                    <i class="fas fa-save"></i>
                </button>
                @endrole
            </td>
            <td>Bs {{number_format($encomienda->PrecioTotal, 2, ',', '.') }}</td>
            @role('Administrador|Vendedor')
            <td>
                <form action="{{route('Encomienda.destroy',$encomienda->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="/Encomienda/{{$encomienda->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i> EDITAR</a>
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
        $('#encomiendas').DataTable({
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

<style>
    /* Colores para los diferentes estados */
    .estado-enviado {
        background-color: #f8d7da;
        /* Rojo claro */
        color: #721c24;
        /* Texto rojo oscuro */
    }

    .estado-recepcionado {
        background-color: #fff3cd;
        /* Amarillo claro */
        color: #856404;
        /* Texto amarillo oscuro */
    }

    .estado-entregado {
        background-color: #d4edda;
        /* Verde claro */
        color: #155724;
        /* Texto verde oscuro */
    }
</style>
<script>
    $(document).ready(function() {
        // Función para actualizar el color del select según el estado
        function actualizarColorEstado(selectElement) {
            const valor = selectElement.val(); // Obtener el valor actual del select
            // Eliminar clases previas de estado
            selectElement.removeClass('estado-enviado estado-recepcionado estado-entregado');

            // Agregar la clase correspondiente al estado seleccionado
            if (valor === 'Enviado') {
                selectElement.addClass('estado-enviado');
            } else if (valor === 'Recepcionado') {
                selectElement.addClass('estado-recepcionado');
            } else if (valor === 'Entregado') {
                selectElement.addClass('estado-entregado');
            }
        }

        // Inicializar colores en la carga de la página
        $('.estado-select').each(function() {
            actualizarColorEstado($(this));
        });

        // Cambiar color dinámicamente cuando se seleccione un nuevo estado
        $(document).on('change', '.estado-select', function() {
            actualizarColorEstado($(this));
        });

        // Manejar clic en el botón de guardar estado
        $(document).on('click', '.btn-guardar-estado', function() {
            const button = $(this);
            const encomiendaId = button.data('id'); // ID de la encomienda
            const nuevoEstado = button.closest('td').find('.estado-select').val(); // Estado seleccionado

            // Mostrar un loader opcional mientras se guarda
            button.html('<i class="fas fa-spinner fa-spin"></i>');

            // Enviar solicitud AJAX
            $.ajax({
                url: `/Encomienda/${encomiendaId}/estado`, // Ruta al controlador Laravel
                method: 'PUT',
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF
                    estado: nuevoEstado // Nuevo estado
                },
                success: function(response) {
                    // Cambiar el ícono de vuelta a guardar si todo salió bien
                    button.html('<i class="fas fa-save"></i>');
                },
                error: function(error) {
                    // Cambiar el ícono de vuelta a guardar en caso de error
                    button.html('<i class="fas fa-save"></i>');
                }
            });
        });
    });
</script>

@stop