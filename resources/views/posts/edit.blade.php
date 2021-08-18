<h1>Editar Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="post">
	@method('put')
	@include('posts.form')
</form>
