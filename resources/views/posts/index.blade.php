<a href="{{ route('posts.create') }}">Novo Post</a>
<hr>

@if (session('msg'))
<div>{{ session('msg') }}</div>
@endif

<h1>Posts</h1>

<ul>
	@foreach ($posts as $post)
	<li>
		[
		<a href="{{ route('posts.show', $post->id) }}">Ver</a> | <a
			href="{{ route('posts.edit', $post->id) }}">Editar</a>
		] {{ $post->title }} | {{ $post->updated_at }}
	</li>
	@endforeach
</ul>

{{ $posts->links() }}
