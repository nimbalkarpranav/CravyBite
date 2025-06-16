<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $restaurants = Restaurant::all();
        return view('admin.Category.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Image validation
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'restaurant_id' => $request->restaurant_id,
            'name' => $request->name,
            'image' => $imagePath,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->back()->with('success', 'Category added successfully.');
    }
    public function index()
{
    $categories = Category::with('restaurant')->latest()->get();
    return view('admin.Category.CategoryTable', compact('categories'));
}




public function apiIndex()
{
    $categories = Category::with('restaurant')->latest()->get();

    return response()->json(
         $categories
    );
}
}
