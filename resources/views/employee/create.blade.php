@extends('adminlte::page')

@section('title', 'Prueba Técnica CRUD')

@section('content_header')
    <h1>AÑADIR EMPLEADO</h1>
@stop

@section('content')
    <form action="/employees" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="surname" name="surname" required>
        </div>
        <div class="mb-3">
            <label for="job" class="form-label">Puesto</label>
            <select type="text" class="form-control" id="job" name="job" required>
            <option value="a">a</option>
            <option value="b">b</option>
            <option value="c">c</option>
            <option value="d">d</option>
            <option value="e">e</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-select-label" for="public">Empresa</label>
            <select type="text" class="form-control" id="company" name="company" required>
            @foreach ($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
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