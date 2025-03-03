@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h2>Add Sidebar Data</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('sidebar.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telegram</label>
                <input type="text" name="telegram" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">X</label>
                <input type="text" name="X" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Snapchat</label>
                <input type="text" name="snapchat" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
