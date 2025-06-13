@extends('layout.master')

@section('title', 'Add Restaurant')

@section('content')
    <div class="container">
        <br><br>x   
        <h2>Add Restaurant</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ url('/restaurant/store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Description:</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Location:</label>
                <input type="text" name="location" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Logo:</label>
                <input type="file" name="logo" class="form-control-file">
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="is_active" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Restaurant</button>
        </form>
    </div>
@endsection
