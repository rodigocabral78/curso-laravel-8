<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
		// $posts = Post::orderBy('id', 'desc')->paginate();
		$posts = Post::latest()->paginate();
		return view('posts.index', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PostRequest $request)
	{
		//
		Post::create($request->all());
		return redirect()
			->route('posts.index')
			->with('msg', 'Post Criado com sucesso');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	// public function show(Post $post)
	public function show($post)
	{
		//
		// $post = Post::where('id', $id)->first();
		// $post = Post::find($id);
		$post = Post::find($post);
		if (!$post) {
			# code...
			return redirect()->route('posts.index');
		}
		// dd($post);
		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	// public function edit(Post $post)
	public function edit($post)
	{
		//
		$post = Post::find($post);
		if (!$post) {
			# code...
			// return redirect()->route('posts.index');
			return redirect()->back();
		}
		// dd($post);
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	// public function update(Request $request, Post $post)
	public function update(PostRequest $request, $post)
	{
		//
		$post = Post::find($post);
		if (!$post) {
			# code...
			return redirect()->route('posts.index');
		}
		// dd($post);
		$post->update($request->all());

		return redirect()
			->route('posts.index')
			->with('msg', 'Post Atualizado com sucesso');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Post  $post
	 * @return \Illuminate\Http\Response
	 */
	// public function destroy(Post $post)
	public function destroy($post)
	{
		//
		$post = Post::find($post);
		if (!$post) {
			# code...
			return redirect()->route('posts.index');
		}
		// dd($post);
		$post->delete();

		return redirect()
			->route('posts.index')
			->with('msg', 'Post Deletado com sucesso');
	}
}
