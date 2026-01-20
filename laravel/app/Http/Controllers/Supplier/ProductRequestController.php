<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductRequestController extends Controller
{
    public function index()
    {
        $supplier = Auth::guard('supplier')->user();
        $requests = ProductRequest::where('supplier_id', $supplier->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('supplier.requests.index', compact('requests'));
    }

    public function create()
    {
        $supplier = Auth::guard('supplier')->user();
        return view('supplier.requests.create', compact('supplier'));
    }

    public function store(Request $request)
    {
        $supplier = Auth::guard('supplier')->user();

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        $data['supplier_id'] = $supplier->id;
        $data['product_type'] = $supplier->product_type;
        $data['status'] = 'pending';

        // Handle all 4 images
        for ($i = 1; $i <= 4; $i++) {
            $imageField = $i === 1 ? 'image' : 'image' . $i;
            if ($request->hasFile($imageField)) {
                $data[$imageField] = $request->file($imageField)->store('product_requests', 'public');
            } else {
                $data[$imageField] = null;
            }
        }

        ProductRequest::create($data);

        return redirect()->route('supplier.requests.index')
            ->with('success', 'Product request submitted successfully! Waiting for admin approval.');
    }

    public function show($id)
    {
        $supplier = Auth::guard('supplier')->user();
        $productRequest = ProductRequest::where('supplier_id', $supplier->id)
            ->findOrFail($id);

        return view('supplier.requests.show', compact('productRequest'));
    }

    public function edit($id)
    {
        $supplier = Auth::guard('supplier')->user();
        $productRequest = ProductRequest::where('supplier_id', $supplier->id)
            ->findOrFail($id);

        // Can only edit pending requests
        if ($productRequest->status !== 'pending') {
            return redirect()->route('supplier.requests.index')
                ->with('error', 'Cannot edit approved or rejected requests.');
        }

        return view('supplier.requests.edit', compact('productRequest', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $supplier = Auth::guard('supplier')->user();
        $productRequest = ProductRequest::where('supplier_id', $supplier->id)
            ->findOrFail($id);

        // Can only edit pending requests
        if ($productRequest->status !== 'pending') {
            return redirect()->route('supplier.requests.index')
                ->with('error', 'Cannot edit approved or rejected requests.');
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048',
            'image2' => 'nullable|image|max:2048',
            'image3' => 'nullable|image|max:2048',
            'image4' => 'nullable|image|max:2048',
        ]);

        // Handle all 4 images
        for ($i = 1; $i <= 4; $i++) {
            $imageField = $i === 1 ? 'image' : 'image' . $i;
            if ($request->hasFile($imageField)) {
                // Delete old image if exists
                if ($productRequest->$imageField) {
                    Storage::disk('public')->delete($productRequest->$imageField);
                }
                $data[$imageField] = $request->file($imageField)->store('product_requests', 'public');
            }
        }

        $productRequest->update($data);

        return redirect()->route('supplier.requests.index')
            ->with('success', 'Product request updated successfully!');
    }

    public function destroy($id)
    {
        $supplier = Auth::guard('supplier')->user();
        $productRequest = ProductRequest::where('supplier_id', $supplier->id)
            ->findOrFail($id);

        // Can only delete pending requests
        if ($productRequest->status !== 'pending') {
            return redirect()->route('supplier.requests.index')
                ->with('error', 'Cannot delete approved or rejected requests.');
        }

        // Delete all images if exist
        for ($i = 1; $i <= 4; $i++) {
            $imageField = $i === 1 ? 'image' : 'image' . $i;
            if ($productRequest->$imageField) {
                Storage::disk('public')->delete($productRequest->$imageField);
            }
        }

        $productRequest->delete();

        return redirect()->route('supplier.requests.index')
            ->with('success', 'Product request deleted successfully!');
    }
}
