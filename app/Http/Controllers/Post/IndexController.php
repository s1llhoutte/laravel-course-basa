<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
