@extends('layouts.plantilla')

@section('contenido')
    <h2>Crear un Nuevo Libro</h2>
<br>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" id="titulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" name="autor" id="autor" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="disponible">Disponible</option>
                <option value="vendido">Vendido</option>
            </select>
        </div>

        <div class="row">
            <div class="col">
                <input type="submit" value="Guardar" class="btn btn-primary">
                <input type="reset" value="Limpiar" class="btn btn-danger">
                <a href="{{ route('books.show') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
