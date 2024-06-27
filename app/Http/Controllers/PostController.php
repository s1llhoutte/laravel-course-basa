<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('posts', compact('posts'));
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

    public function update()
    {
        $post = Post::find(6);

        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1000,
            'is_published' => 0,
        ]);

        dd('updated');
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');

//      восстановление из мусорки выглядит так:
//        $post = Post::withTrashed()->find(2);
//        $post->restore();
//        dd('restored');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'some post',
            'content' => 'some content',
            'image' => 'some-image.jpg',
            'likes' => 40,
            'is_published' => 1,
        ];

        $post = Post::firstOrCreate([
            'title' => 'some title phpStorm'
        ], [
            'title' => 'some title phpStorm',
            'content' => 'some content',
            'image' => 'some-image.jpg',
            'likes' => 40,
            'is_published' => 1,
        ]);
        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'updateorcreate some post',
            'content' => 'updateorcreate some content',
            'image' => 'updateorcreate some-image.jpg',
            'likes' => 4000,
            'is_published' => 0,
        ];

        $post = Post::updateOrCreate(
            [
                'title' => 'some title not phpStorm',
            ],
            [
                'title' => 'some not phpStorm',
                'content' => 'it\'s not updated some content',
                'image' => 'it\'s not updated some-image.jpg',
                'likes' => 4000,
                'is_published' => 0,
            ]
        );

        dump($post->content);
    }
}
