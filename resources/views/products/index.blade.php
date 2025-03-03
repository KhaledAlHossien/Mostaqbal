@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Manage Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td><img src="{{ asset('storage/' . $product->photo) }}" width="50" alt="{{ $product->name }}"></td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
