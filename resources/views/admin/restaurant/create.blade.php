<<<<<<< HEAD
@extends('layout.master')
@section('title', 'Add New Restaurant')
@section('content')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="bg-blue-600 py-4 px-6">
                <h2 class="text-2xl font-bold text-white">
                    <i class="fas fa-utensils mr-2"></i> Add New Restaurant
                </h2>
            </div>

            <div class="p-6">
                @if (session('success'))
                    <div class="mb-4 p-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded">
                        <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/restaurant/store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- First Row: Name and Location -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name Field -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-1">Restaurant Name</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <i class="fas fa-store"></i>
                                </span>
                                <input type="text" name="name" required
                                       class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                       placeholder="Enter restaurant name">
                            </div>
                        </div>

                        <!-- Location Field -->
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-1">Location</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <i class="fas fa-map-marker-alt"></i>
                                </span>
                                <input type="text" name="location" required
                                       class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                       placeholder="Enter restaurant location">
                            </div>
                        </div>
                    </div>

                    <!-- Second Row: Description and Status -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Description Field -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-1">Description</label>
                            <textarea name="description" rows="4"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                                      placeholder="Tell us about your restaurant"></textarea>
                        </div>

                        <!-- Status and Logo Column -->
                        <div class="space-y-4">
                            <!-- Status Field -->
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Status</label>
                                <select name="is_active" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                    <option value="1" class="text-green-600">Active</option>
                                    <option value="0" class="text-red-600">Inactive</option>
                                </select>
                            </div>

                            <!-- Logo Upload -->
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-1">Logo</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col w-full h-24 border-2 border-dashed hover:border-blue-400 hover:bg-gray-50 rounded-lg cursor-pointer transition">
                                        <div class="flex flex-col items-center justify-center pt-2">
                                            <i class="fas fa-cloud-upload-alt text-2xl text-gray-400 mb-1"></i>
                                            <p class="text-xs text-gray-500 text-center">Upload logo</p>
                                        </div>
                                        <input type="file" name="logo" class="opacity-0">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg focus:outline-none focus:shadow-outline transition duration-150">
                            <i class="fas fa-plus-circle mr-2"></i> Add Restaurant
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
=======
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

    <form action="{{ url('/restaurant/store') }}" method="POST" enctype="multipart/form-data">
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
>>>>>>> c801c000440ed4abbe4a9b5f45813bcb980d34cc
