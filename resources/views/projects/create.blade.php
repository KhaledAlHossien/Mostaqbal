@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Add New Project</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Project Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Project Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Project Photo -->
                            <div class="mb-3">
                                <label for="photo" class="form-label">Project Photo</label>
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" required>
                                @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Project Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label">Project Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Add Project</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
