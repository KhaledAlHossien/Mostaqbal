@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">User Details</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit User</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
