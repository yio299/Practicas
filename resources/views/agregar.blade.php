@extends('layout/plantilla')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Agregar nueva persona</h5>
    <div class="card-body">
        
        <p class="card-text">
            <form action="{{ route('personas.store') }}" method="POST">
                @csrf
                <label for="">Nombre</label>
                <input type="text" name="Nombre" class="form-control" required>
                <label for="">Email</label>
                <input type="email" name="Email" class="form-control" required>
                <label for="">Contraseña</label>
                <input type="text" name="Contraseña" class="form-control" required>
                
                <br>
                <a href="{{ route("personas.index") }}" class="btn btn-info" >
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Agregar
                </button>
                
            </form>
        </p>
        
    </div>
</div>
@endsection