<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $count = $request->get('pageCount') ?: 5;
        $post = Post::orderBy('Created_at', 'desc')->simplePaginate($count);
        $data = [
            'message' => 'success',
            'articles' => $post
        ];
        return response()->json($data);
    }

    public function detail($id)
    {
        $post = Post::findOrFail($id);
        $data = [
            'message' => 'success',
            'article' => $post
        ];
        return response()->json($data);

    }
}
