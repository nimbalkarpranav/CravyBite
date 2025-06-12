@extends('layout.master')

@section('title', 'Products Index')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Products</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
            Add Product
        </a>

        {{-- You can add product listing table or message here --}}
    </div>
@endsection
