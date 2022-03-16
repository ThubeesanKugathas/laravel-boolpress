@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex">
                    Posts List

                    <a class="ms-auto" href="{{ route('admin.posts.create') }}">New Post</a>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item pe-auto d-flex">
                                {{$post->title}} <br>
                                By: {{ $post->user->name }} <br>
                                @if($post->category !== null)
                                    Category: {{ $post->category->categoryName }}
                                @else
                                    Category: None
                                @endif
                                <a href="{{ route('admin.posts.show', $post->slug) }}" class="ms-auto me-3">Details</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection