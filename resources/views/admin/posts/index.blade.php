@extends('admin.layouts.app')

@section('title', 'Posts')

@section('content')

<h1>Posts</h1>
<br><br>
<a href=" {{ route('posts.create') }} ">
    Adicionar novo produto
</a>
<br><br>

<form action=" {{ route('posts.search')}} " method="post">
    @csrf
    <input type="text" name="search" id="search" placeholder="Pesquisar">
    <button type="submit">Pesquisar</button>
</form>

@if (session('message'))

<div>
    {{ session('message') }}
</div>

@endif

@foreach ($posts as $post)
<p>
    <strong>Título: {{ $post->title }} </strong>
    <br><br>
    {{ $post->content }}
    <br><br>
    
    <a href="{{ route( 'posts.edit', $post->id ) }}">
        Editar
    </a>
    <br>
    <a href="{{ route( 'posts.show', $post->id ) }}">
        Detalhes
    </a>
</p>
<br><hr><br>
@endforeach

@if (isset($filters))
{{ $posts->appends($filters)->links() }}    
@else
{{ $posts->links() }}
@endif



@endsection