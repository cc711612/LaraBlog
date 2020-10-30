<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        dd($request);
        die();
        return "MainController@index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post=new Post;
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $post->title=request('title');
        $post->content=request('content');
        $post->user_id=\Auth::id();
        if($post->save()){
            return "save";
        }
        die('<script>alert("error");history.back();</script>');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $post->title=request('title');
        $post->content=request('content');
        $post->user_id=\Auth::id();
        if($post->save()){
            return redirect()->route('posts.edit',[$post->id])->with('success',true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->del=1;
        if($post->save()){
            return redirect()->to('/');
        }
    }
    public function content(Request $request)
    {
        dd($request);
        die();
    }
}
