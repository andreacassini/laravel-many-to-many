@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-between my-4">
        <div class="col-12 text-center">
            <a href="{{ Route('admin.posts.index') }}" class="btn btn-dark">Home</a>
        </div>
        <div class="col mt-4">
            <h2 class="text-uppercase text-center">Edit</h2>
        </div>
        <div class="row">
            <div class="col-12 mt-1">
                <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group my-2">
                        <label class="control-label mb-1">Title:</label>
                        <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="title" value="{{old('title') ?? $post->title}}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <div>
                            <img src="{{asset('storage/'.$post->cover_image)}}" alt="img" width="500px">
                        </div>
                        <label class="control-label mb-1">Cover Image:</label>
                        <input type="file" id="cover_image" name="cover_image" class="form-control  @error('cover_image')is-invalid @enderror">
                        @error('cover_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label mb-1">Content:</label>
                        <input type="text" id="content" name="content" class="form-control" placeholder="content" value="{{old('content') ?? $post->content}}">
                    </div>
                    <div class="form-group my-2">
                        <label class="control-label mb-1">Slug:</label>
                        <input type="text" id="slug" name="slug" class="form-control" placeholder="slug" value="{{old('slug') ?? $post->slug}}">
                    </div>
                    <div class=" form-group my-2">
                        <button type="submit" class="btn btn-success"> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection