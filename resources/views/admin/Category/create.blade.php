<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h2>Add Food Category</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Restaurant:</label>
        <select name="restaurant_id" required>
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
            @endforeach
        </select><br><br>

        <label>Category Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Category Image:</label>
        <input type="file" name="image"><br><br>

        <label>Status:</label>
        <select name="status">
            <option value="1" selected>Active</option>
            <option value="0">Inactive</option>
        </select><br><br>

        <button type="submit">Add Category</button>
    </form>
</body>
</html>
