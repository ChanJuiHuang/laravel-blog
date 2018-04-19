<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'asc')->paginate(5);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with([
            'categories'=>$categories,
            'tags'=>$tags
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:50|unique:posts,slug',
            'category_id'=>'required|integer',
            'tags.*'=>'integer',
            'body'=>'required',
            'image'=>'sometimes|image'
        ]);
        
        $post = new Post(...array_values($request->except(['_token', 'tags', 'image'])));
        
        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');
            $post->image = $fileName;
        }

        $post->save();

        $post->tags()->sync($request->tags);

        $request->session()->flash('success', 'The blog post was successfully saved!');
        return redirect()->route('posts.show', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load('category', 'tags', 'comments');
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post->load('category', 'tags');
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit')->with([
            'post'=>$post, 
            'categories'=>$categories,
            'tags'=>$tags
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required|max:255',
            'slug'=>'required|alpha-dash|min:5|max:50|unique:posts,slug,'.$post->id,
            'category_id'=>'required|integer',
            'tags.*'=>'integer',
            'body'=>'required',
            'image'=>'sometimes|image'
        ]);

        if ($request->hasFile('image')) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $request->image->storeAs('images', $fileName, 'public');
            $post->image = $fileName;
        } else if ($post->image !== null) {
            Storage::delete('public/images/'.$post->image);
            $post->image = null;
            
        }

        $post->fill($request->except(['_token', 'tags', 'image']))->save();

        $post->tags()->sync($request->tags);

        $request->session()->flash('success', 'The blog post was successfully updated!');

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image !== null) {
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();
        session()->flash('success', 'The blog post was successfully deleted!');
        return redirect()->route('posts.index');
    }
}
