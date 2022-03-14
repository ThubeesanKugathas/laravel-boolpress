@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Posts List

                    <a href="{{ route('admin.posts.create') }}">New Post</a>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($posts as $post)
                            <li class="list-group-item pe-auto">
                                {{$post->title}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection