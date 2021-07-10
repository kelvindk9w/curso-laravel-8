@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>    

    <br><br>
@endif

@csrf
<input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title ?? old('title') }}">
<br><br>
<textarea name="content" id="content" cols="30" rows="5" placeholder="Conteúdo">{{ $post->content ?? old('content') }}</textarea>
<br><br>
<button type="submit">Enviar</button>