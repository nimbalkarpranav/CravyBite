@extends('layout.master')
@section('title', 'Product Details')    
@section('content')
<div class="container py-4">
    <div class="card shadow-lg overflow-hidden">
        <div class="row g-0">
            <!-- Product Image Column -->
            <div class="col-md-5 bg-light d-flex align-items-center justify-content-center p-4">
                <img src="{{ asset('storage/'. $product->pr_image) }}" 
                     class="img-fluid rounded-3 shadow-sm" 
                     style="max-height100%; object-fit: contain;"
                     alt="{{ $product->pr_name }}">
            </div>
            
            <!-- Product Details Column -->
            <div class="col-md-7">
                <div class="card-body p-4" style="max-height: 80vh; overflow-y: auto;">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <h2 class="card-title mb-0">{{ $product->pr_name }}</h2>
                        <span class="badge bg-{{ $product->is_available ? 'success' : 'danger' }} fs-6">
                            {{ $product->is_available ? "Available" : "Out of Stock" }}
                        </span>
                    </div>
                    
                    <div class="d-flex align-items-center mb-4">
                        @if($product->pr_discount)
                        <h3 class="text-danger me-3 mb-0">₹{{ number_format($product->pr_price - ($product->pr_price * $product->pr_discount / 100), 2) }}</h3>
                        <span class="text-decoration-line-through text-muted me-2">₹{{ number_format($product->pr_price, 2) }}</span>
                        <span class="badge bg-info">{{ $product->pr_discount }}% OFF</span>
                        @else
                        <h3 class="text-primary mb-0">₹{{ number_format($product->pr_price, 2) }}</h3>
                        @endif
                    </div>
                    
                    <div class="mb-4">
                        <h5 class="border-bottom pb-2">Description</h5>
                        <p class="card-text">{{ $product->pr_description }}</p>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-muted mb-2">Category</h6>
                                    <p class="card-text fs-5">
                                        <i class="fas fa-tag me-2 text-primary"></i>
                                        {{ $product->category->name ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-muted mb-2">Restaurant</h6>
                                    <p class="card-text fs-5">
                                        <i class="fas fa-store me-2 text-success"></i>
                                        {{ $product->restaurant->name ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center border-top pt-3">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Back to List
                        </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .badge {
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
</style>

<!-- Include Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@endsection