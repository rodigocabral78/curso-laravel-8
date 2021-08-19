@extends('layouts.app')

@section('title', 'Novo Post!!!')

@section('content')
<h1>Novo Post</h1>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
	@csrf
	@include('posts.form')
</form>
@endsection
