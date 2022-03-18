@extends('layouts.app')

@section('content')
@php
    // use Carbon\Carbon;
    $dateFormat = 'd/m/Y H:i'
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header d-flex">
                {{ $post->title }}
                <a href="{{route('admin.posts.index')}}" class="ms-auto me-3">Back</a>
                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="me-3"><i class="fa-solid fa-pen-to-square" title="Change"></i></i></a>
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
                        Creation date: {{ $post->created_at->format($dateFormat) }}
                        <br>
                        Last update: {{ $post->updated_at->format($dateFormat) }} ( {{ $post->updated_at->diffForHumans(Carbon\Carbon::now())}} )
                        <br>
                        Username: {{ $post->user->name }}
                        <br>
                        @if($post->category !== null)
                            Category: {{ $post->category->categoryName }}
                            <br>
                            Description: {{ $post->category->categoryDescription }}
                            <br>
                        @endif

                        @forelse($post->tags as $tag)
                             #{{ $tag->tag_name }} 
                        @empty
                             --none-- 
                        @endforelse

                        @if($post->image !== null)
                            <br>
                            <h4>Photo:</h4>
                            <img src="https://unsplash.it/600/300?image={{ $post->image }}" alt="image">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>   
@endsection

