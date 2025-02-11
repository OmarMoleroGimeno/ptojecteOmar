@extends('plantilla1')

@section('title', 'Página de Inicio')

@section('content')
    <div class="jumbotron bg-light p-5 rounded">
        <h1 class="display-4">Bienvenido al Blog</h1>
        <p class="lead">Este es un blog donde encontrarás artículos interesantes sobre diversos temas.</p>
        <hr class="my-4">
        <p>Explora nuestro listado de posts y descubre contenido interesante.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('posts.listado') }}" role="button">Ver Posts</a>
    </div>
@endsection
