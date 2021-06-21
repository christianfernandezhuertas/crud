@extends('adminlte::page')

@section('title', 'Prueba Técnica CRUD')

@section('content_header')
    <h1>EDITAR EMPLEADO</h1>
@stop

@section('content')
    <form action="/employees/{{$employee->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$employee->name}}">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{$employee->surname}}">
        </div>
        <div class="mb-3">
            <label for="job" class="form-label">Puesto</label>
            <select class="form-select" name="job" id="job">
                @foreach ($jobs as $job)
                    @if ($job->job == $employee->job)
                        <option value="{{$employee->job}}" selected>{{$job->job}}</option>
                    @else
                        <option value="{{$job->job}}">{{$job->job}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-select-label" for="public">Empresa</label>
            <select class="form-select" name="company" id="company">
                @foreach ($companies as $company)
                    @if ($company->id == $employee->company_id)
                        <option value="{{$company->id}}" selected>{{$company->name}}</option>
                    @else
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/employees" class="btn btn-danger">Cancelar</a>
    </form> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop