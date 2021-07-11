@extends('admin.layouts.app')

@section('title', 'Criar post')

@section('content')

<h1>Adicionar novo produto</h1>
<br><br>

<form action=" {{ route('posts.store') }} " method="post" enctype="multipart/form-data">
    @include('admin.posts._partials.form')
</form>

@endsection