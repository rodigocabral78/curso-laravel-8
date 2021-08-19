@extends('layouts.app')

@section('title', 'Detalhes do Post!!!')

@section('content')
<h1>Detalhes Post {{ $post->title }}</h1>

<ul>
	<li><strong>Título:</strong> {{ $post->title }}</li>
	<li><strong>Conteudo:</strong> {{ $post->content}}</li>
	<li><img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width: 200px;"></li>
</ul>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
	@csrf
	<input type="hidden" name="_method" value="delete">
	<button type="submit">Deletar {{ $post->title }}</button>
</form>

<hr>
<a href="{{ route('posts.index') }}" class="button">Voltar Posts</a>
@endsection
