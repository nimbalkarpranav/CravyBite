<!DOCTYPE html>
<html>
<head>
    <title>Add Restaurant</title>
</head>
<body>
    <h2>Add Restaurant</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

<form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Name:</label>
        <input type="text" name="name" required><br><br>

        <label>Description:</label>
        <textarea name="description"></textarea><br><br>

        <label>Location:</label>
        <input type="text" name="location" required><br><br>

        <label>Logo:</label>
        <input type="file" name="logo"><br><br>

        <label>Status:</label>
        <select name="is_active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select><br><br>

        <button type="submit">Add Restaurant</button>
    </form>
</body>
</html>