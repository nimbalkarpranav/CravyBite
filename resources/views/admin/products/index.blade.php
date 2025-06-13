@extends('layout.master')

@section('title', 'Products Index')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Products</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">
            Add Product
        </a>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product )
                <tr>
                    <td>{{ ++$count }}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img src="{{ asset('storage/' . $product->image) }}" width="50" height="50" alt="Product Image" >
                    </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        @if ($product->is_available == 1)
                            <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
                </tr>

                @empty
                    <tr>
                        <td colspan="7" class="text-center">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- You can add product listing table or message here --}}
    </div>
@endsection
