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
                            <li class="list-group-item pe-auto">
                                {{$post->title}}

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