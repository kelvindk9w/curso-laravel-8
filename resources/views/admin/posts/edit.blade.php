@extends('admin.layouts.app')

@section('title', 'Editar post')

@section('content')

<h1>Editar produto - {{$post->title}}</h1>
<br><br>

<form action=" {{ route('posts.update', $post->id) }} " method="post">
    @method('PUT')
    @include('admin.posts._partials.form')
</form>

@endsection