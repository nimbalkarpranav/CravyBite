@extends('layout.master')
@section('title', 'Edit Product')    
@section('content')

<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h2 class="mb-0 text-center">Edit Product</h2>
        </div>

        <div class="card-body p-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form action="{{ route('products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Restaurant</label>
                            <select name="restaurant_id" class="form-select" required>
                                <option disabled>-- Select Restaurant --</option>
                                @foreach ($restaurants as $restaurant)
                                    <option value="{{ $restaurant->id }}" {{ old('restaurant_id', $product->restaurant_id) == $restaurant->id ? 'selected' : '' }}>
                                        {{ $restaurant->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option disabled>-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}" {{ old('category_id', $product->category_id) == $category->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <input type="text" name="name" class="form-control" required value="{{ old('name', $product->pr_name) }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->pr_description) }}</textarea>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Price (₹)</label>
                                <input type="number" step="0.01" name="price" class="form-control" required value="{{ old('price', $product->pr_price) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Discount (%)</label>
                                <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount', $product->pr_discount) }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*" value="{{ old('image', $product->pr_image) }}">
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Food Type</label>
                                <select name="food_type" class="form-select">
                                    <option value="1" {{ old('food_type', $product->is_food_type) == 1 ? 'selected' : '' }}>Veg</option>
                                    <option value="0" {{ old('food_type', $product->is_food_type) == 0 ? 'selected' : '' }}>Non-Veg</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Availability</label>
                                <select name="is_available" class="form-select">
                                    <option value="1" {{ old('is_available', $product->Availability) == 1 ? 'selected' : '' }}>Available</option>
                                    <option value="0" {{ old('is_available', $product->Availability) == 0 ? 'selected' : '' }}>Not Available</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Status</label>
                                <select name="is_featured" class="form-select">
                                    <option value="0" {{ old('is_featured', $product->status) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ old('is_featured', $product->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Tags</label>
                            <input type="text" name="tags" class="form-control" placeholder="tag1, tag2, tag3" value="{{ old('tags', $product->tags ?? '') }}">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                    <button type="submit" class="btn btn-dark px-4">
                        <i class="fas fa-save me-2"></i>Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
