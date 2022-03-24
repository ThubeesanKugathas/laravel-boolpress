@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex">
                    deletedPosts List

                    {{-- <a class="ms-auto" href="{{ route('admin.deletedPosts.create') }}">New deletedPost</a> --}}
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($deletedPosts as $deletedPost)
                            <li class="list-group-item pe-auto d-flex">
                                {{$deletedPost->title}} <br>
                                By: {{ $deletedPost->user->name }} <br>
                                @if($deletedPost->category !== null)
                                    Category: {{ $deletedPost->category->categoryName }} <br>
                                @else
                                    Category: None <br>
                                @endif

                                @forelse($deletedPost->tags as $tag)
                                    #{{ $tag->tag_name }}
                                @empty
                                    --none-- 
                                @endforelse
                                {{-- <a href="{{ route('admin.deleteddeletedPosts.show', $deletedPost->slug) }}" class="ms-auto me-3"><i class="fa-solid fa-eye" title="Details"></i></a>
                                <a href="{{ route('admin.deleteddeletedPosts.edit', $deletedPost->slug) }}" class="me-3"><i class="fa-solid fa-pen-to-square" title="Change"></i></i></a>
                                @include('admin.partials.deleteLinks', [
                                    "route" => 'admin.deleteddeletedPosts.destroy',
                                    "id" => $deletedPost->id
                                ]) --}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection