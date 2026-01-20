<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CropsController extends Controller
{
    /**
     * Display a listing of the crops.
     */
    public function index()
    {
        $crops = Crop::orderBy('created_at', 'desc')->get();
        return view('crop.index', compact('crops'));
    }

    /**
     * Display a specific crop.
     */
    public function show(Crop $crop): \Illuminate\View\View
    {
        $relatedCrops = Crop::whereNotIn('id', [$crop->id])->latest()->get();
        return view('crop.show', compact('crop', 'relatedCrops'));
    }

    /**
     * Admin - list crops.
     */
    public function adminIndex()
    {
        $crops = Crop::orderBy('created_at', 'desc')->get();
        return view('admin.crops.index', compact('crops'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('crop.create');
    }

    /**
     * Store new crop.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|integer|min:1|max:5',
            'reviews' => 'nullable|integer|min:0',
            'status' => 'required|in:in_stock,limited,unavailable,in-stock,limited-stock',
            'image' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        $validated['status'] = str_replace('-', '_', $validated['status']);

        // Handle all 4 images
        for ($i = 1; $i <= 4; $i++) {
            $imageField = $i === 1 ? 'image' : 'image' . $i;
            if ($request->hasFile($imageField)) {
                $validated[$imageField] = $request->file($imageField)->store('crops', 'public');
            }
        }

        Crop::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Crop created successfully!');
    }

    /**
     * Show edit form.
     */
    public function edit(Crop $crop)
    {
        return view('crop.edit', compact('crop'));
    }

    /**
     * Update crop.
     */
    public function update(Request $request, Crop $crop)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'rating' => 'nullable|integer|min:1|max:5',
            'reviews' => 'nullable|integer|min:0',
            'status' => 'required|in:in_stock,limited,unavailable,in-stock,limited-stock',
            'image' => 'nullable|image|max:2048',
        ]);

        $validated['status'] = str_replace('-', '_', $validated['status']);

        if ($request->hasFile('image')) {
            if ($crop->image_folder) {
                Storage::disk('public')->delete($crop->image_folder);
            }
            $validated['image_folder'] = $request->file('image')->store('crops', 'public');
        }

        $crop->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Crop updated successfully!');
    }

    /**
     * Delete crop.
     */
    public function destroy(Crop $crop): \Illuminate\Http\RedirectResponse
    {
        if ($crop->image_folder) {
            Storage::disk('public')->delete($crop->image_folder);
        }

        $crop->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Crop deleted successfully!');
    }
}
