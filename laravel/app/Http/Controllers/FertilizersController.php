<?php

namespace App\Http\Controllers;

use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FertilizersController extends Controller
{
    public function index()
    {
        $fertilizers = Fertilizer::orderBy('title')->get();

        return view('fertilizers.index', compact('fertilizers'));
    }

    // Admin - List all fertilizers
    public function adminIndex()
    {
        $fertilizers = Fertilizer::orderBy('created_at', 'desc')->get();
        return view('admin.fertilizers.index', compact('fertilizers'));
    }

    // Show fertilizer detail page
    public function show($id)
    {
        $fertilizer = Fertilizer::findOrFail($id);
        $relatedFertilizers = Fertilizer::where('id', '!=', $id)->get();

        return view('fertilizers.show', compact('fertilizer', 'relatedFertilizers'));
    }

    // Show create form
    public function create()
    {
        return view('fertilizers.create');
    }

    // Store new fertilizer
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:in_stock,limited,unavailable',
            'image' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        // Handle all 4 images
        for ($i = 1; $i <= 4; $i++) {
            $imageField = $i === 1 ? 'image' : 'image' . $i;
            if ($request->hasFile($imageField)) {
                $validated[$imageField] = $request->file($imageField)->store('fertilizers', 'public');
            }
        }

        Fertilizer::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Fertilizer created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $fertilizer = Fertilizer::findOrFail($id);
        return view('fertilizers.edit', compact('fertilizer'));
    }

    // Update fertilizer
    public function update(Request $request, $id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'status' => 'required|in:in_stock,limited,unavailable',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($fertilizer->image) {
                Storage::disk('public')->delete($fertilizer->image);
            }
            $validated['image'] = $request->file('image')->store('fertilizers', 'public');
        }

        $fertilizer->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Fertilizer updated successfully!');
    }

    // Delete fertilizer
    public function destroy($id)
    {
        $fertilizer = Fertilizer::findOrFail($id);

        // Delete image if exists
        if ($fertilizer->image) {
            Storage::disk('public')->delete($fertilizer->image);
        }

        $fertilizer->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Fertilizer deleted successfully!');
    }
}
