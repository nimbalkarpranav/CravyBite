 @extends('layout.master')
@section('title', 'Create Product')
@section('content')

<div class="container" style="max-width: 600px; margin: 20px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    <h2 style="margin-bottom: 20px; color: #333; font-size: 24px;">Create Product</h2>

    @if (session('success'))
        <div style="background: #e6ffed; color: #38a169; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" style="display: grid; gap: 15px;">
        @csrf

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;"> Restaurant</label>
            <select name="restaurant_id" required style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">-- Select Restaurant --</option>
                @foreach ($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Category</label>
            <select name="category_id" required style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Name</label>
            <input type="text" name="name" required style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
        </div>

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Description</label>
            <textarea name="description" rows="2" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div style="display: grid; gap: 5px;">
                <label style="font-weight: 500;">Price ($)</label>
                <input type="number" name="price" step="0.01" required style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
            <div style="display: grid; gap: 5px;">
                <label style="font-weight: 500;">Discount (%)</label>
                <input type="number" name="discount" step="0.01" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
            </div>
        </div>

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Image</label>
            <input type="file" name="image" style="padding: 5px 0;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div style="display: grid; gap: 5px;">
                <label style="font-weight: 500;">Availability</label>
                <select name="is_available" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="1">Available</option>
                    <option value="0">Not Available</option>
                </select>
            </div>
            <div style="display: grid; gap: 5px;">
                <label style="font-weight: 500;">Featured</label>
                <select name="is_featured" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                    <option value="0">No</option>
                    <option value="1">Yes</option>
                </select>
            </div>
        </div>

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Tags</label>
            <input type="text" name="tags" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;" placeholder="Separate with commas">
        </div>

        <button type="submit" style="background: #4299e1; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; font-weight: 500; margin-top: 10px;">
            Add Product
        </button>
    </form>
</div>

@endsection
