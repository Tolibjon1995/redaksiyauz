<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories','tags'));
    }


    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $fileName = time().'-'.$request->file('upload')->getClientOriginalName();
            $request->file('upload')->move('site/image/posts/', $fileName);
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('site/image/posts/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Post $post)
    {
     
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required', // Corrected the duplicated rule
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjusted for image file validation
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'. $file->getClientOriginalExtension();
            $file->move('site/image/posts/', $imageName);
            $requestData['image'] = $imageName;
        }

        $requestData['slug'] = \Str::slug($requestData['title_uz']);
        $post=Post::create($requestData);
        $post->tags()->attach($request->tags);
        return redirect()->route('admin.post.index')->with('success', 'Malumot bazaga saqlandi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title_uz' => 'required',
            'title_ru' => 'required',
            'body_uz' => 'required',
            'body_ru' => 'required', // Corrected the duplicated rule
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif', // Adjusted for image file validation
        ]);

        $requestData = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time().'.'. $file->getClientOriginalExtension();
            $file->move('site/image/posts/', $imageName);
            $requestData['image'] = $imageName;
        }

        $requestData['slug'] = \Str::slug($requestData['title_uz']);
        $post->update($requestData);
        $post->tags()->sync($request->tags);
        return redirect()->route('admin.post.index')->with('success', 'Malumot O\'zgartirildi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.post.index')->with('success', 'Malumot O\'chirildi');
    }


}
