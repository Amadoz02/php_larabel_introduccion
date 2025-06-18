<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 5 post
        $userposts = Post::factory(5)->create();

        // Por cada post su imagen asociada
        foreach ($userposts as $post) {
            $post->images()->createMany(
                Image::factory()
                    ->count(1)
                    ->make([
                        'imageable_id' => $post->id,
                        'imageable_type' => Post::class,
                    ])
                    ->toArray()
            );
        }
    }
}
