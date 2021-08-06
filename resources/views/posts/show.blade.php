<h1>Detalhes Post {{ $post->title }}</h1>

<ul>
	<li><strong>Título:</strong> {{ $post->title }}</li>
	<li><strong>Conteudo:</strong> {{ $post->content}}</li>
</ul>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
	@csrf
	<input type="hidden" name="_method" value="delete">
	<button type="submit">Deletar {{ $post->title }}</button>
</form>

<hr>
<a href="{{ route('posts.index') }}" class="button">Voltar Posts</a>
