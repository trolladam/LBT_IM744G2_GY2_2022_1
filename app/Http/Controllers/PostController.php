<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
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
        $topics = Topic::orderBy('name')->get();

        return view('posts.create')->with([
            'topics' => $topics,
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
            'title' => 'required|min:2|max:240',
            'cover' => 'file|image',
            'topic_id' => 'required|exists:topics,id',
            'description' => 'required|min:10',
            'content' => 'required',
        ]);

        $post = $request
            ->user()
            ->posts()
            ->create($request->except('_token'));

        $image = $this->uploadImage($request);

        if ($image) {
            $post->cover = $image->basename;
            $post->save();
        }

        return redirect()->route('post.details', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Request $request)
    {
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
    }

    public function comment(Post $post, Request $request)
    {
        $request->validate([
            'comment' => 'required|min:10',
        ]);

        $comment = new Comment;

        $comment->message = $request->comment;
        $comment->user()->associate($request->user());

        $post->comments()->save($comment);

        return redirect()->route('post.details', $post);
    }

    private function uploadImage(Request $request)
    {
        $file = $request->file('cover');

        if (!$file) {
            return;
        }

        $fileName = uniqid();

        $cover = Image::make($file)->save(public_path("/uploads/posts/{$fileName}.{$file->extension()}"));

        return $cover;
    }
}
