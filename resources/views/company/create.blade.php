@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CREAR EMPRESA</h1>
@stop

@section('content')
    <form action="/companies" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="mb-3">
            <label for="vat_number" class="form-label">CIF</label>
            <input type="text" class="form-control" id="vat_number" name="vat_number">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="public" name="public">
            <label class="form-check-label" for="public">Pública</label>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imagen</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/companies" class="btn btn-danger">Cancelar</a>
    </form> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop