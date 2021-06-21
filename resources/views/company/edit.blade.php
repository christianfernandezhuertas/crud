@extends('adminlte::page')

@section('title', 'Prueba Técnica CRUD')

@section('content_header')
    <h1>EDITAR EMPRESA</h1>
@stop

@section('content')
    <form action="/companies/{{$company->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="vat_number" class="form-label">CIF</label>
            <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{$company->vat_number}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$company->name}}">
        </div>
        <div class="mb-3 form-check">
            @php
                $html = '<input type="checkbox" class="form-check-input" id="public" name="public" value="{{$company->public}}">';
                $htmlChecked = '<input type="checkbox" class="form-check-input" id="public" name="public" value="{{$company->public}}" checked>';
                if($company->public == 1){
                    echo $htmlChecked;    
                }
                else{
                    echo $html;   
                }                
            @endphp
            
            <label class="form-check-label" for="public">Pública</label>
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