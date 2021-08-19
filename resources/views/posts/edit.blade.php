@extends('layouts.app2')

@section('title', 'Editar Post!!!')

@section('content')
<h1>Editar Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
	@method('put')
	@include('posts.form')
</form>
@endsection
