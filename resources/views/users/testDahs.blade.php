@extends('main_layout')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Products</h5>
                        <p class="card-text">View, add, edit, and delete products.</p>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Go to Products</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Projects</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Projects</h5>
                        <p class="card-text">View, add, edit, and delete projects.</p>
                        <a href="{{ route('projects.index') }}" class="btn btn-light">Go to Projects</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">View, add, edit, and delete users.</p>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Go to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
