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
                                    Category: {{ $post->category->categoryName }} <br>
                                @else
                                    Category: None <br>
                                @endif

                                @forelse($post->tags as $tag)
                                    #{{ $tag->tag_name }}
                                @empty
                                    --none-- 
                                @endforelse
                                <a href="{{ route('admin.posts.show', $post->slug) }}" class="ms-auto me-3"><i class="fa-solid fa-eye" title="Details"></i></a>
                                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="me-3"><i class="fa-solid fa-pen-to-square" title="Change"></i></i></a>
                                @include('admin.partials.deleteLinks', [
                                    "route" => 'admin.posts.destroy',
                                    "id" => $post->id
                                ])
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection