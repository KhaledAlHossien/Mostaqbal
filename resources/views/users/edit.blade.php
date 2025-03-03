@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- User Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">User Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password (Optional) -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password (Leave blank to keep current password)</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
