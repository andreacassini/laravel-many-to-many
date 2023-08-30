@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-between my-4 align-items-center">
        <div class="col-6">
            <h1 class="">Add new post</h1>
        </div>
        <div class="col-6 text-end">
            <div>
                <a href="{{ route('admin.posts.index') }}" class="btn btn-sm btn-dark">Home</a>
            </div>
        </div>
        <div class="col-12">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- TITLE --}}
                <div class="form-group mt-4">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- COVER IMAGE --}}
                <div class="form-group mt-4">
                    <label class="control-label">Cover Image:</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- TECHNOLOGIES --}}
                <div class="form-group mt-4">
                    <span>Select Technologies:</span>
                    @foreach ($technologies as $technology)
                        <div class="my-2">
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : ''}} class="form-check-input  @error('technologies') is-invalid @enderror">
                            <label class="form-check-label">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                    @error('technologies')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- TYPES --}}
                <div class="form-group mt-4">
                    <label for="content">Type:</label>
                    <select name="type_id" id="type_id" class="form-control @error('type_id')is-invalid @enderror" value="">
                        <option value="">Choose type</option>
                        @foreach($types as $type)
                        <option value="{{ $type->id }}"  @selected(old('type_id') == $type->id)>{{ $type->name}} </option>
                        @endforeach
                    </select>
                    @error('type_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- CONTENT --}}
                <div class="form-group mt-4">
                    <label for="content">Content:</label>
                    <input type="text" name="content" id="content" class="form-control"  value="{{ old('content') }}">
                </div>
                <div class="form-group my-4 col-12 text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection