<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('post.create', compact('categories'));
    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
        ]);
        Post::create($data);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
        ]);
        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function delete()
    {
        $post = Post::find(2);
        $post->delete();
        dd('deleted');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
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
