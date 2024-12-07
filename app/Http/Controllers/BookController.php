<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //listar libros
    public function index()
    {
    $books = Book::where('usuario_id', auth()->id())->paginate(10); // Lista solo los libros del usuario autenticado
    return view('books.show', compact('books'));
    }

    //autenticar usuario
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function crear()
    {
        return view('books.crear'); // Mostrar la vista para crear libros
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'estado' => 'required|in:disponible,vendido',
        ]);

        $book = new Book($request->all());
        $book->usuario_id = auth()->id(); // Asigna el usuario autenticado
        $book->save();

        return redirect()->route('books.crear')->with('success', 'Libro publicado con éxito');
    }
    public function show()
    {
        $books = Book::paginate(10); // Obtén los libros con paginación
        return view('books.show', compact('books')); // Pasa los libros a la vista
    }
//edit
    public function edit($id)
    {
    $book = Book::findOrFail($id); // Busca el libro o lanza un error 404
    return view('books.edit', compact('book'));
    }   
    
    public function update(Request $request, $id)
    {
    $request->validate([
        'titulo' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'estado' => 'required|in:disponible,vendido',
    ]);

    $book = Book::findOrFail($id);
    $book->update($request->all()); // Actualiza el registro con los datos validados

    return redirect()->route('books.show')->with('success', 'Libro actualizado con éxito');
    }
//borrar  

    public function destroy($id)
    {
    // Busca el libro por su ID
    $book = Book::findOrFail($id);
    // Elimina el libro
    $book->delete();

    // Redirige con un mensaje de éxito
    return redirect()->route('books.show')->with('success', 'Libro eliminado con éxito.');
    }

//uscar
    // BookController.php
    public function search(Request $request)
    {
    // Obtener el término de búsqueda
    $query = $request->input('query');
    
    // Realizar la búsqueda en la base de datos
    $books = Book::where('titulo', 'like', '%' . $query . '%')
                 ->orWhere('autor', 'like', '%' . $query . '%')
                 ->paginate(10);

    // Retornar la vista con los libros encontrados
    return view('books.show', compact('books'));
    }
    
}
