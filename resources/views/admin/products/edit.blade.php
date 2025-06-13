@extends('layout.master')
@section('title', 'Edit Product')    
@section('content')

<div class="container d-flex justify-content-center mt-4">
    <div class="card shadow-lg p-4" style="width: 50%; max-height: 80vh; overflow-y: auto;">
        <h2 class="mb-4 text-center">Edit Product</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div class="mb-3">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" width="100" class="img-thumbnail">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image">
                            <label class="form-check-label" for="remove_image">
                                Remove current image
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label class="form-label">Price (₹)</label>
                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        <option value="{{ $category->category_id }}" {{ old('category_id', $product->category_id) == $category->category_id ? 'selected' : '' }}>
    {{ $category->name }}
</option>
                    @endforeach
                </select>
            </div>

            <!-- Restaurant -->
            <div class="mb-3">
                <label class="form-label">Restaurant</label>
                <select name="restaurant_id" class="form-control" required>
                    <option value="">Select Restaurant</option>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $product->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                            {{ $restaurant->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Availability -->
            <div class="mb-3">
                <label class="form-label">Product Status</label>
                <select name="is_available" class="form-control">
                    <option value="1" {{ old('is_available', $product->is_available) == 1 ? 'selected' : '' }}>Available</option>
                    <option value="0" {{ old('is_available', $product->is_available) == 0 ? 'selected' : '' }}>Not Available</option>
                </select>
            </div>

            <!-- Featured -->
            <div class="mb-3">
                <label class="form-label">Featured Product</label>
                <select name="is_featured" class="form-control">
                    <option value="1" {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection