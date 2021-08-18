<h1>Novo Post</h1>

<form action="{{ route('posts.store') }}" method="post">
	@csrf
	@include('posts.form')
</form>
