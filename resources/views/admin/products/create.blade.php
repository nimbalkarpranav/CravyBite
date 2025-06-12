@extends('layout.master')
@section('title', 'Create Product') 
@section('content')

<h2>Create Product</h2>
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" required><br><br>

    <label>Description:</label>
    <textarea name="description"></textarea><br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" required><br><br>

    <label>Image:</label>
    <input type="file" name="image"><br><br>

    <label>Status:</label>
    <select name="is_active">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
    </select><br><br>

    <button type="submit">Add Product</button>
@endsection