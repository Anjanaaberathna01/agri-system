<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use App\Models\Fertilizer;
use App\Models\Crop;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ToolsController extends Controller
{
	public function index()
	{
		$tools = Tool::orderBy('title')->get();

		return view('tools.index', compact('tools'));
	}

	public function show($id)
	{
		$tool = Tool::findOrFail($id);
		$relatedTools = Tool::where('id', '!=', $id)
			->orderBy('title')
			->get();
		return view('tools.show', compact('tool', 'relatedTools'));
	}

	// Admin Dashboard
	public function dashboard()
	{
		$tools = Tool::orderBy('created_at', 'desc')->get();
		$fertilizers = Fertilizer::orderBy('created_at', 'desc')->get();
		$crops = Crop::orderBy('created_at', 'desc')->get();
		$suppliers = Supplier::orderBy('created_at', 'desc')->get();
		return view('admin.dashboard', compact('tools', 'fertilizers', 'crops', 'suppliers'));
	}

	// Admin - List all tools
	public function adminIndex()
	{
		$tools = Tool::orderBy('created_at', 'desc')->get();
		return view('admin.tools.index', compact('tools'));
	}

	// Show create form
	public function create()
	{
		return view('tools.create');
	}

	// Store new tool
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
				$validated[$imageField] = $request->file($imageField)->store('tools', 'public');
			}
		}

		Tool::create($validated);

		return redirect()->route('admin.dashboard')->with('success', 'Tool created successfully!');
	}

	// Show edit form
	public function edit($id)
	{
		$tool = Tool::findOrFail($id);
		return view('tools.edit', compact('tool'));
	}

	// Update tool
	public function update(Request $request, $id)
	{
		$tool = Tool::findOrFail($id);

		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'price' => 'required|numeric|min:0',
			'description' => 'required|string',
			'status' => 'required|in:in_stock,limited,unavailable',
			'image' => 'nullable|image|max:2048'
		]);

		if ($request->hasFile('image')) {
			// Delete old image if exists
			if ($tool->image) {
				Storage::disk('public')->delete($tool->image);
			}
			$validated['image'] = $request->file('image')->store('tools', 'public');
		}

		$tool->update($validated);

		return redirect()->route('admin.dashboard')->with('success', 'Tool updated successfully!');
	}

	// Delete tool
	public function destroy($id)
	{
		$tool = Tool::findOrFail($id);

		// Delete image if exists
		if ($tool->image) {
			Storage::disk('public')->delete($tool->image);
		}

		$tool->delete();

		return redirect()->route('admin.dashboard')->with('success', 'Tool deleted successfully!');
	}
}
