@extends('layouts.template')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <style>
        img{
            height: 50px;
            width: 50px;
        }
    </style>
@endsection

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
@endsection

@section('content')
    @if (Route::has('login'))
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand">Prueba Técnica CRUD</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        @auth
                            <li class="d-flex">
                                <a href="{{ url('/companies') }}" class="btn btn-secondary">Empresas</a>
                            </li>
                            <li class="d-flex">
                                <a href="{{ url('/employees') }}" class="btn btn-secondary">Empleados</a>
                            </li>
                        @else
                            <li class="d-flex">
                                <a href="{{ route('login') }}" class="btn btn-secondary">Log in</a>
                            </li>
                        @endauth
                </ul>
            </div>    
        </div>    
    </nav>
    @endif
    <div class="container-fluid mt-5">
        <table id="companies" class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">CIF</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">IMAGEN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{$company->id}}</td>
                        <td>{{$company->vat_number}}</td>
                        <td>{{$company->name}}</td>
                        <td><img src="storage/{{$company->image}}"></td>
                        
                    </tr>   
                @endforeach
            </tbody>
        </table>
    </div>
@endsection