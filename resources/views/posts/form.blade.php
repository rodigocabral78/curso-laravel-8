@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

@csrf
<input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title ?? old('title') }}">
<br>
<textarea name="content" id="content" cols="30" rows="4"
	placeholder="Conteudo">{{ $post->content ?? old('content') }}</textarea>
<br>
<button type="submit">Salvar</button>
<hr>
<a href="{{ route('posts.index') }}" class="button">Voltar Posts</a>
