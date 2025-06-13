<?php

// app/Http/Controllers/RestaurantController.php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller

{
    public function index()
    {

    }


    public function create()
    {
        return view('admin.restaurant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        Restaurant::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'logo' => $logoPath,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->back()->with('success', 'Restaurant added successfully.');
    }
}
