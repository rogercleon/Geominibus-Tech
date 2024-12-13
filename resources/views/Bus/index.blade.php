@extends('adminlte::page')

@section('title', 'Sistema de Monitoreo "Security Bus"')

@section('content_header')
    <h1>LISTA DE BUSES</h1>
@stop

@section('content')
    <a href="Bus/create" class="btn btn-primary active">REGISTRAR BUSES</a>
    <a href="{{ route('Bus.pdf')}}" class="btn btn-info" style="margin-left: 15px">PDF</a>
    <table id="buses" class="table table-striped" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Numero Bus</th>
                <th scope="col">Agencia</th>
                <th scope="col">Numero Asiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buses as $bus)
                <tr>
                    <td>{{$bus->id}}</td>
                    <td>{{$bus->Num_Bus}}</td>
                    <td>{{$bus->agencias->Agencia}}</td>
                    <td>{{$bus->Num_Asiento}}</td>
                    <td>
                        <form action="{{route('Bus.destroy',$bus->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/Bus/{{$bus->id}}/edit" class="btn btn-success">EDITAR</a>
                            <button type="submit" class="btn btn-danger">ELIMINAR</button>
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
            $('#buses').DataTable({"lengthMenu":[[5,10,50,-1],[5,10,50,"All"]]});
        } );
    </script>
@stop
