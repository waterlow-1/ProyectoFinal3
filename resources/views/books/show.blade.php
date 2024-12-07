@extends('layouts.plantilla')

@section('contenido')
    <h1>Lista de Libros</h1>

    <!-- Mensajes de éxito y error -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <!-- Formulario de búsqueda -->
    <form class="d-flex ms-auto" role="search" method="GET" action="{{ route('books.search') }}">
        <input class="form-control me-2" type="search" name="query" placeholder="Buscar un libro" aria-label="Search" value="{{ request()->query('query') }}">
        <button class="btn btn-outline-success" type="submit">Buscar un libro</button>
    </form>

    <!-- Tabla de libros -->
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Precio</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
            <tr>
                <td>{{ $book->titulo }}</td>
                <td>{{ $book->autor }}</td>
                <td>{{ $book->precio }}</td>
                <td>{{ ucfirst($book->estado) }}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="{{ route('books.edit', $book->id) }}">Editar</a>

                    <!-- Botón para abrir el modal -->
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalEliminar{{ $book->id }}">
                        Eliminar
                    </button>

                    <!-- Modal de confirmación -->
                    <div class="modal fade" id="modalEliminar{{ $book->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $book->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel{{ $book->id }}">Eliminar Libro</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar el libro <strong>{{ $book->titulo }}</strong>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No hay libros disponibles.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $books->links() }}
@endsection
