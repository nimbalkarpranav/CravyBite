<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::with('category')->get();
        // return $products;
        $count = 0;
        return view('admin.products.index', compact('products', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.products.create', compact('categories', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,category_id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'image' => 'nullable|mimes:jpeg,png,webp,jpg,gif|max:2048',
             'food_type' => 'required|boolean',
            'is_available' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'tags' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'restaurant_id' => $request->restaurant_id,
            'category_id' => $request->category_id,
            'pr_name' => $request->name,
            'pr_description' => $request->description,
            'pr_price' => $request->price,
            'pr_discount' => $request->discount,
            'pr_image' => $imagePath,
            'pr_food_type' => $request->food_type,
            'Availability' => $request->is_available,
            'status' => $request->is_featured,
            'tags' => $request->tags,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $product = Product::with('category','restaurant')->findOrFail($id);
        
        $categories = Category::all();
        $restaurants = Restaurant::all();
        return view('admin.products.edit', compact('product', 'categories', 'restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:categories,category_id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'image' => 'nullable|mimes:jpeg,png,webp,jpg,gif|max:2048',
             'food_type' => 'required|boolean',
            'is_available' => 'required|boolean',
            'is_featured' => 'required|boolean',
            'tags' => 'nullable|string',
        ]);
        $product = Product::findOrFail($id);
          $imagePath = null;
        if ($request->hasFile('image')) {
           $oldImagePath =  public_path("storage/". $product->pr_image);
            // Delete the old image if it exist
            if(file_exists($oldImagePath)){
                @unlink(public_path($product->pr_image));
            }  
             $imagePath = $request->file('image')->store('products', 'public');     
        }  

        $product->update([
            'restaurant_id' => $request->restaurant_id,
            'category_id' => $request->category_id,
            'pr_name' => $request->name,
            'pr_description' => $request->description,
            'pr_price' => $request->price,
            'pr_discount' => $request->discount,
            'pr_image' => $imagePath ? $imagePath : $product->pr_image,
            'pr_food_type' => $request->food_type,
            'Availability' => $request->is_available,
            'status' => $request->is_featured,
            'tags' => $request->tags,   

        ]); 
        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($product_id)

    {
        $product = Product::findOrFail($product_id);

        // Delete the image if it exists
        if ($product->pr_image && Storage::disk('public')->exists($product->pr_image)) {
            Storage::disk('public')->delete($product->pr_image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
