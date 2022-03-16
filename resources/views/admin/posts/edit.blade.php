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

                    <div class="mb-3">
                        <label>Category</label>
                        <select name="category_id" class="form-select" aria-label="Default select example">
                            <option value="" >-- None --</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" >{{ $category->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Tags: </label>
                        @foreach($tags as $tag)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}" id="tag_{{ $tag->id }}" name="tags[]">
                            <label class="form-check-label" for="tag_{{ $tag->id }}">
                                {{ $tag->tag_name }}
                            </label>
                        </div>
                        @endforeach
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