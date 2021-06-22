@extends('adminlte::page')

@section('title', 'Prueba Técnica CRUD')

@section('content_header')
    <h1>Empresas</h1>
@stop

@section('content')
    <a href="/companies/create" class="btn btn-primary mt-3 mb-3">CREAR</a>

    <table id="companies" class="table table-hover mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">CIF</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">IMAGEN</th>
                <th scope="col">PÚBLICA</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td><a class="companyLink" href="companies/{{$company->id}}/">{{$company->id}}</a></td>
                    <td><a class="companyLink" href="companies/{{$company->id}}/">{{$company->vat_number}}</a></td>
                    <td><a class="companyLink" href="companies/{{$company->id}}/">{{$company->name}}</a></td>
                    <td><a class="companyLink" href="companies/{{$company->id}}/"><img src="storage/{{$company->image}}"></a></td>
                    @if ($company->public)
                        <td><a class="companyLink" href="companies/{{$company->id}}/"><i class="fas fa-check"></i></a></td>   
                    @else
                        <td><a class="companyLink" href="companies/{{$company->id}}/"><i class="fas fa-times"></i></a></td>
                    @endif
                    <td>
                        <form action="{{route ('companies.destroy', $company->id)}}" method="POST">
                            <a href="companies/{{$company->id}}/edit" class="btn btn-secondary">EDITAR</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">BORRAR</button>
                        </form>  
                    </td>
                </tr>   
            @endforeach
        </tbody>
    </table> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">

    <style>
        .companyLink {
            color: black;
            text-decoration: none;
        }
        .companyLink:hover {
            color: black;
            text-decoration: underline;
        }
        img{
            height: 50px;
            width: 50px;
        }
    </style>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#companies').DataTable({
                "lengthMenu": [ [5, 10, -1], [5, 10, "All"] ]
            });
        } );
    </script> 
@stop