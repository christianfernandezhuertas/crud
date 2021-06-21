@extends('adminlte::page')

@section('title', 'Prueba Técnica CRUD')

@section('content_header')
    <h1>Empleados</h1>
@stop

@section('content')
    <a href="/companies" class="btn btn-dark mt-3 mb-3">ATRÁS</a>

    <table id="employees" class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">APELLIDO</th>
                <th scope="col">PUESTO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{$employee->id}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->surname}}</td>
                    <td>{{$employee->job}}</td>
                </tr>   
            @endforeach
        </tbody>
    </table> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#employees').DataTable({
                "lengthMenu": [ [5, 10, -1], [5, 10, "All"] ]
            });
        } );
    </script>   
@stop