@extends('shop')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Profile</h2>
    <!-- @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white text-center">
            Profile Details
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Name:</strong>
                </div>
                <div class="col-md-8">
                    {{ $user->name }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Email:</strong>
                </div>
                <div class="col-md-8">
                    {{ $user->email }}
                </div>
            </div>
            <div class="text-center">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Profile
                </a>
            </div>
        </div>
    </div>
</div>
@endsection