@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Products</div>
                    <div class="card-body">
                        <h5 class="card-title">Total: {{ $productCount}}</h5>
                        <a href="{{ route('products.index') }}" class="btn btn-light">Manage Products</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Projects</div>
                    <div class="card-body">
                        <h5 class="card-title">Total: {{ $projectCount}}</h5>
                        <a href="{{ route('projects.index') }}" class="btn btn-light">Manage Projects</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Users</div>
                    <div class="card-body">
                        <h5 class="card-title">Total: {{ $userCount}}</h5>
                        <a href="{{ route('users.index') }}" class="btn btn-light">Manage Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
