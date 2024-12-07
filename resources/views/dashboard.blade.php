
@extends('layouts.plantilla')

@section('contenido')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Contenedor para el mensaje -->
                <div class="">
                    <!-- Mensaje de éxito destacado -->
                    <h3 class="">{{ __("¡Registrado con éxito!") }}</h3>
                    <p>{{ __("Bienvenido a tu cuenta. Ya puedes empezar a explorar todas las funcionalidades.") }}</p>
                </div>
            </div>
        </div>
 
@endsection
