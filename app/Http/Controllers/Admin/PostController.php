<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Type;
use App\Models\Technology;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        $technologies = Technology::all();

        return view('admin.posts.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $form_data = $request->all();


        if ($request->hasFile('cover_image')) {
            $path = Storage::put('post_image', $request->cover_image);
            $form_data['cover_image'] = $path;
        }

        $post = new Post();
        $form_data['slug'] = $post->generateSlug($form_data['title']);

        $post->fill($form_data);
        $post->save();

        if ($request->has('technologies')) {

            $post->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = Type::all();

        $technologies = Technology::all();

        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $form_data = $request->all();
        if ($request->hasFile('cover_image')) {
            if ($post->cover_image) {
                Storage::delete($post->cover_image);
            }

            $path = Storage::put('post_image', $request->cover_image);
            $form_data['cover_image'] = $path;
        }

        $post->update($form_data);

        if ($request->has('technologies')) {

            $post->technologies()->sync($request->technologies);
        }

        return redirect()->route('admin.posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        $post->technologies()->detach();

        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
