@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header d-flex">
                {{ $post->title }}
                <a href="{{route('admin.posts.index')}}" class="ms-auto">Back</a>
                <a class="ms-3" href="{{ route('admin.posts.edit', $post->slug) }}">Change</a>
                @include('admin.partials.deleteLinks', [
                    "route" => 'admin.posts.destroy',
                    "id" => $post->id
                ])
                </div>
                    <div class="card-body">
                    <h4>
                        {{ $post->content }}
                    </h4>
                    <div class="mt-3">
                        Data creazione: {{ $post->created_at }}
                        <br>
                        Data ultima modifica: {{ $post->updated_at }}
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection