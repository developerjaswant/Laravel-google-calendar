<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blogs = Blog::create($request->all());
        return response()->json($blogs, 201);
    }

    public function show($id)
    {
        $blogs = Blog::findOrFail($id);
        return response()->json($blogs);
    }

    public function edit(Blog $blog)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'author' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blogs = Blog::findOrFail($id);
        $blogs->update($request->all());
        return response()->json($blogs);
    }

   
    public function destroy($id)
    {
        $blogs = Blog::findOrFail($id);
        $blogs->delete();
        return response()->json(null, 204);
    }
}