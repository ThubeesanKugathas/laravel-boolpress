@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-header d-flex">
                    Contacts List

                    <a class="ms-auto" href="{{ route('admin.contacts.create') }}">New Contact</a>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($contacts as $contact)
                            <li class="list-group-item pe-auto d-flex">
                                Name: {{$contact->contact_name}} <br>
                                Email: {{ $contact->email }} <br>

                                <div class="ms-auto d-flex">
                                    <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="me-3"><i class="fa-solid fa-pen-to-square" title="Change"></i></i></a>
                                    @include('admin.partials.deleteLinks', [
                                        "route" => 'admin.contacts.destroy',
                                        "id" => $contact->id
                                    ])
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection