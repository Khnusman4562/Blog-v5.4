<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;

class BlogsController extends Controller
{
    public function index()
    {
        $Blog = Blog::all();
        return response()->json([
            'data' => $Blog,
            'success' => true
        ], 200);
    }

    public function store(Request $request)
    {
        $Blog = new Blog($request->all());
        $Blog->save();
        return response()->json([
            'data' => $Blog,
            'success' => true
        ], 201);
    }

    public function show($id)
    {
        $Blog = Blog::find($id);
        return response()->json([
            'data' => $Blog,
            'success' => true,
        ], 200);
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required'  
        ]);

        $blog->update($request->all());

        return response()->json([
            'data'     => $blog,
            'success'  =>   true
        ], 200);
    }

    public function destroy($id)
    {
        Blog::destroy($id);
        return response()->json([
            'message' => 'Blog Deleted successfully',
            'success' => true
        ], 204);
    }
}
