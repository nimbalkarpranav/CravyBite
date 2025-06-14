 @extends('layout.master')
@section('title', 'Create Product')
@section('content')

<div class="container" style="max-width: 900px; margin: 20px auto; padding: 25px; background: white; border-radius: 8px; box-shadow: 0 2px 15px rgba(0,0,0,0.1);">
    <h2 style="margin-bottom: 25px; color: #2d3748; font-size: 26px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Create Product</h2>

    @if (session('success'))
        <div style="background: #ebf8ff; color: #2b6cb0; padding: 12px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #4299e1;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; gap: 5px;">
            <label style="font-weight: 500;">Restaurant</label>
            <select name="restaurant_id" required style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="">-- Select Restaurant --</option>
                @foreach ($restaurants as $restaurant)
                    <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                @endforeach
            </select>
        </div>

                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Category</label>
                    <select name="category_id" required style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; background: #f8fafc;">
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Name</label>
                    <input type="text" name="name" required style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;">
                </div>

                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Description</label>
                    <textarea name="description" rows="4" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;"></textarea>
                </div>
            </div>

            <!-- Right Column -->
            <div style="display: grid; gap: 15px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Price ($)</label>
                        <input type="number" name="price" step="0.01" required style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;">
                    </div>
                    <div>
                        <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Discount (%)</label>
                        <input type="number" name="discount" step="0.01" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;">
                    </div>
                </div>

                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Image</label>
                    <div style="border: 1px dashed #cbd5e0; border-radius: 6px; padding: 15px; text-align: center; background: #f8fafc;">
                        <input type="file" name="image" style="width: 100%;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div>
                        <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Availability</label>
                        <select name="is_available" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;">
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Featured</label>
                        <select name="is_featured" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label style="display: block; font-weight: 500; margin-bottom: 6px; color: #4a5568;">Tags</label>
                    <input type="text" name="tags" style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px;" placeholder="tag1, tag2, tag3">
                </div>
            </div>
        </div>

        <button type="submit" style="background: #4299e1; color: white; padding: 12px 20px; border: none; border-radius: 6px; cursor: pointer; font-weight: 500; margin-top: 20px; width: 100%; font-size: 16px; transition: background 0.3s;">
            Add Product
        </button>
    </form>
</div>

@endsection
