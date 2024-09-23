<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crée 10 articles
        Post::factory(10)->create()->each(function ($post) {
            $tags = Tag::inRandomOrder()->take(3)->pluck('id');
            $post->tags()->attach($tags);
            Comment::factory(5)->create(['post_id' => $post->id]);
        });
    }
}
