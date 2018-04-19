<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
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
            'author'=>'required|max:255',
            'email'=>'required|email|max:255',
            'content'=>'required|min:5|max:255',
            'post_id'=>'required|numeric'
        ]);
        
        $comment = $request->all();
        $comment['approved'] = true;

        Comment::create($comment);

        $request->session()->flash('success', 'The comment was added!');

        return redirect()->route('posts.show', $request->input('post_id'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'author'=>'required|max:255',
            'email'=>'required|email|max:255',
            'content'=>'required|min:5|max:255'
        ]);

        $comment->fill($request->all())->save();

        $request->session()->flash('success', 'The comment was successfully updated!');

        return redirect()->route('posts.show', $comment->post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $post_id = $comment->post->id;
        $comment->delete();
        session()->flash('success', 'The comment was successfully deleted!');
        return redirect()->route('posts.show', $post_id);
    }
}
