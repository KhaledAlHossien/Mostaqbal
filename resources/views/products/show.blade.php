@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-0">Product Details</h4>
                    </div>
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . $product->photo) }}" class="img-fluid rounded mb-3" style="max-width: 300px;">
                        <h5><strong>Name:</strong> {{ $product->name }}</h5>
                        <p><strong>Description:</strong> {{ $product->description }}</p>

                        <div class="d-flex justify-content-between">
                            <a href="{{route('home')}}" class="btn btn-secondary">Back</a>

                            @if(Auth::user())
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit Product</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
