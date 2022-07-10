@extends('layouts.app')

@section('content')
<div class="container">


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{ Session::get('mensaje') }}
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif



<a href="{{ url('mascota/create') }}" class="btn btn-success" > Registrar nueva mascota </a>
<br/>
<br/>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>ID</th>    
            <th>Nombre</th>
            <th>Especie</th>
            <th>Raza</th>
            <th>Sexo</th>
            <th>Edad</th>
            <th>Color</th>
            <th>Enfermedades</th>
            <th>Acciones</th>
        </tr>
    </thead>
        
    <tbody>
        @foreach($mascotas as $mascota)
        <tr>
            <td>{{ $mascota->id }}</td>
            <td>{{ $mascota->Nombre }}</td>
            <td>{{ $mascota->Especie }}</td>
            <td>{{ $mascota->Raza }}</td>
            <td>{{ $mascota->Sexo }}</td>
            <td>{{ $mascota->Edad }}</td>
            <td>{{ $mascota->Color }}</td>
            <td>{{ $mascota->Enfermedades }}</td>
            <td>
                
            <a href="{{ url('/mascota/'.$mascota->id.'/edit') }}" class="btn btn-warning">
                    Editar
            </a>
            |
                
            <form action="{{ url('/mascota/'.$mascota->id ) }}" class="d-inline" method="post">
            @csrf
            {{ method_field('DELETE')}}
            
            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que quieres borrar?')"
            value="Borrar">

            </form>

            </td>
            </tr>
            @endforeach

    </tbody>
</table>

{!! $mascotas->links()  !!}

</div>
@endsection
