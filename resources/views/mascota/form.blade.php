<h1> {{ $modo }} mascota </h1>

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
<ul>       
        @foreach($errors->all() as $error)
        <li> {{ $error }} </li>
    @endforeach
</ul>    
    </div>    
@endif



<div class="form-group">
<label for="Nombre"> Nombre </label>
<input class="form-control" type="text" name="Nombre" value="{{ isset ($mascota->Nombre)?$mascota->Nombre:old('Nombre') }}" id="Nombre">   
</div>

<div class="form-group">
<label for="Especie"> Especie </label>
<input class="form-control" type="text" name="Especie" value="{{ isset ($mascota->Especie)?$mascota->Especie:old('Especie') }}" id="Especie">    
</div>

<div class="form-group">
<label for="Raza"> Raza </label>
<input class="form-control" type="text" name="Raza" value="{{ isset ($mascota->Raza)?$mascota->Raza:old('Raza')}}" id="Raza">    
</div>

<div class="form-group">
<label for="Sexo"> Sexo </label>
<input class="form-control" type="text" name="Sexo" value="{{ isset ($mascota->Sexo)?$mascota->Sexo:old('Sexo')}}" id="Sexo">    
</div>

<div class="form-group">
<label for="Edad"> Edad </label>
<input class="form-control" type="String" name="Edad" value="{{ isset ($mascota->Edad)?$mascota->Edad:old('Edad')}}" id="Edad">    
</div>

<div class="form-group">
<label for="Color"> Color </label>
<input class="form-control" type="text" name="Color" value="{{ isset ($mascota->Color)?$mascota->Color:old('Color')}}" id="Color">    
</div>

<div class="form-group">
<label for="Enfermedades"> Enfermedades </label>    
<input class="form-control" type="text" name="Enfermedades" value="{{ isset ($mascota->Enfermedades)?$mascota->Enfermedades:old('Enfermedades') }}" id="Enfermedades">   
</div>

<br/>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos">   
<a class="btn btn-primary" href="{{ url('mascota/') }}"> Regresar </a>