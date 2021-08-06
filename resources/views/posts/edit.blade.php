<h1>Editar Post</h1>

@if ($errors->any())
<ul>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach
</ul>
@endif

<form action="{{ route('posts.update', $post->id) }}" method="post">
	@csrf
	@method('put')
	<input type="text" name="title" id="title" placeholder="Título" value="{{ $post->title }}">
	<br>
	<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteudo">{{ $post->content }}</textarea>
	<br>
	<button type="submit">Salvar</button>
</form>

<hr>
<a href="{{ route('posts.index') }}" class="button">Voltar Posts</a>
