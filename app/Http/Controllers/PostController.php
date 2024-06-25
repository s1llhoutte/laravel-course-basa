<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::where('is_published', 0)->first();
        dump($post->title);
        dd('end');
    }

    public function create()
    {
        $postsArr = [
            [
                'title' => 'title from phpStorm',
                'content' => 'some content from phpStorm',
                'image' => 'image.jpg',
                'likes' => 150,
                'is_published' => 1,
            ],
            [
                'title' => 'another title from phpStorm',
                'content' => 'another some content from phpStorm',
                'image' => 'another-image.jpg',
                'likes' => 30,
                'is_published' => 1,
            ],
        ];

        foreach ($postsArr as $item) {
            Post::create($item);
        }

        dd('created');
    }
}
