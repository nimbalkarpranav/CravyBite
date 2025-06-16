@extends('layout.master')

@section('title', 'Products Index')

@section('content')
    <div class="container mt-4">
       

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
                    <th>Food Type</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product )
                <tr>
                
                    <td>{{ ++$count }}</td>
                    <td>{{$product->pr_name}}</td>
                    <td>
                        <img src="{{ asset('storage/'. $product->pr_image) }}" width="50" height="100" alt="Product Image" >
                    </td>
                    <td>{{$product->pr_price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>

                        <span class="badge {{ $product->food_type == 1 ? 'bg-success' : 'bg-danger' }} text-white">
                            {{ $product->food_type == 1 ? 'Veg' : 'Non-Veg' }}
                        </span>
                </td>
                    <td>
                        <span class="badge {{ $product->status == 1 ? 'bg-success' : 'bg-danger' }} text-white">
                            {{ $product->status == 1 ? 'Active' : 'Inactive' }}
                        </span>
                </td>
                  

                <td>
                    <a href="{{ route('products.show', $product->product_id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('products.edit', $product->product_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy',$product->product_id ) }}" method="POST" class="d-inline">
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
