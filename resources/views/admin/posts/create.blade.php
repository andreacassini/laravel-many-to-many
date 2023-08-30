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
                <div class="form-group mt-4">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label class="control-label">Cover Image:</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control @error('cover_image')is-invalid @enderror">
                    @error('cover_image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <span>Seleziona le Tecnologie:</span>
                    @foreach ($technologies as $technology)
                        <div class="my-2">
                            <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" {{ in_array($technology->id, old('technologies', [])) ? 'checked' : ''}} class="form-check-input @error('cover_image')is-invalid @enderror"">
                            <label class="form-check-label">{{ $technology->name }}</label>
                        </div>
                    @endforeach
                    @error('technologies')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="content">Tipologia:</label>
                    <select name="tipologia_id" id="tipologia_id" class="form-control @error('tipologia_id')is-invalid @enderror" value="">
                        <option value="">Choose type</option>
                        @foreach($tipologias as $tipologia)
                        <option value="{{ $tipologia->id }}"  @selected(old('tipologia_id') == $tipologia->id)>{{ $tipologia->name}} </option>
                        @endforeach
                    </select>
                    @error('tipologia_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label for="content">Content:</label>
                    <input type="text" name="content" id="content" class="form-control"  value="{{ old('content') }}">
                </div>
                <div class="form-group my-4 col-12 text-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                @if (count($errors) >0)
<div class="alert alert-danger">
<strong>Whoops! Something went wrong!</strong>
<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
            </form>
        </div>
    </div>
</div>
@endsection