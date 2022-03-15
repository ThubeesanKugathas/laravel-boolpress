@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header d-flex">
                <h3>New Post</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="mb-3">
                    <label>Content</label>
                    <textarea name="content" rows="10" class="form-control @error('content') is-invalid @enderror" required>{{ $post->content }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    </div>

                    <div>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Reset</a>
                    <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection