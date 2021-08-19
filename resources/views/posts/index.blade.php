@extends('layouts.app')

@section('title', 'Listagem dos Posts!!!')

@section('content')
<a href="{{ route('posts.create') }}">Novo Post</a>
<hr>

@if (session('msg'))
<div>{{ session('msg') }}</div>
@endif

<h1>Posts</h1>


<form action="{{ route('posts.search') }}" method="post">
	@csrf
	<input type="search" name="search" placeholder="Search">
	<button type="submit">Search</button>
</form>

<ul>
	@foreach ($posts as $post)
	<li>
		[
		<a href="{{ route('posts.show', $post->id) }}">Ver</a> | <a
			href="{{ route('posts.edit', $post->id) }}">Editar</a>
		] <img src="{{ url("storage/{$post->image}") }}" alt="{{ $post->title }}" style="max-width: 100px;">
		{{ $post->title }} |
		{{ $post->updated_at }}
	</li>
	@endforeach
</ul>

@if (isset($search))
{{ $posts->appends($search)->links() }}
@else
{{ $posts->links() }}
@endif
@endsection
