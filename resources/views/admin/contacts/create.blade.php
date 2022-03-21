@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header d-flex">
                <h3>New Contact</h3>
            </div>

            <div class="card-body">

                <form action="{{ route('admin.contacts.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label>Contact Name</label>
                        <input type="text" name="contact_name" class="form-control @error('contact_name') is-invalid @enderror" value="{{ old('contact_name') }}" required>
                        @error('contact_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
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