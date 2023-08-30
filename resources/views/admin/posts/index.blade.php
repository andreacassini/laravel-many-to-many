@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-between align-items-center mt-4">
            <div class="col-6">
                <h1>I nostri post</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-success" href="{{ route('admin.posts.create')}}">Add post</a>
            </div>
            <div class="col-12 mt-3">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titolo</th>
                            <th>Slug</th>
                            <th>Strumenti</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('admin.posts.destroy', $post->id)}}" class="d-inline-block" onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection