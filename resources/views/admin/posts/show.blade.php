@extends('admin.layouts.app')

@section('title', 'Detalhes do post')

@section('content')

<a href="{{ redirect()->back(); }}">
    Voltar
</a>

<br><hr><br>

<h1>Detalhes do post - {{$post->title}}</h1>

<br><br>

{{ $post->content }}

<br><br>

<form action=" {{ route('posts.destroy', $post->id) }} " method="post">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar o post{{$post->title}}</button>
</form>

@endsection