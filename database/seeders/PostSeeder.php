<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		$postsQuantity = 100;

		Post::factory()
            ->count($postsQuantity)
			->create()
			->each(function ($posts) {
			// print_r($posts);
			// $posts->person()->save(factory(Person::class)->make());
			$posts->save();
		});
	}
}
