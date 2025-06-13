@extends('layout.master')
@section('title', 'Update Product')
@section('content')

<h2>Update Product</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Name:</label>
    <input type="text" name="name" value="{{ $product->name }}" required><br><br>

    <label>Description:</label>
    <textarea name="description">{{ $product->description }}</textarea><br><br>

    <label>Price:</label>
    <input type="number" name="price" step="0.01" value="{{ $product->price }}" required><br><br>

    <label>Image:</label>
    <input type="file" name="image"><br><br>

    <label>Status:</label>
    <select name="is_active">
        <option value="1" {{ $product->is_active ? 'selected' : '' }}>Active</option>
        <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Inactive</option>
    </select><br><br>

    <button type="submit">Update Product</button>
</form>

@endsection