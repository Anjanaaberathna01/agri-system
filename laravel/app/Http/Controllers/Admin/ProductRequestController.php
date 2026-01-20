<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductRequest;
use App\Models\Tool;
use App\Models\Fertilizer;
use App\Models\Crop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductRequestController extends Controller
{
    public function index()
    {
        $pending = ProductRequest::with('supplier')->pending()->orderBy('created_at', 'desc')->get();
        $approved = ProductRequest::with('supplier')->approved()->orderBy('reviewed_at', 'desc')->get();
        $rejected = ProductRequest::with('supplier')->rejected()->orderBy('reviewed_at', 'desc')->get();

        return view('admin.product-requests.index', compact('pending', 'approved', 'rejected'));
    }

    public function show($id)
    {
        $productRequest = ProductRequest::with('supplier')->findOrFail($id);
        return view('admin.product-requests.show', compact('productRequest'));
    }

    public function approve(Request $request, $id)
    {
        $productRequest = ProductRequest::findOrFail($id);

        $request->validate([
            'admin_notes' => 'nullable|string',
        ]);

        // Update request status
        $productRequest->update([
            'status' => 'approved',
            'admin_notes' => $request->admin_notes,
            'reviewed_at' => now(),
        ]);

        // Add product to respective table based on product_type
        $this->addProductToTable($productRequest);

        return redirect()->route('admin.product-requests.index')
            ->with('success', 'Product request approved and added to ' . $productRequest->product_type . ' list!');
    }

    public function reject(Request $request, $id)
    {
        $productRequest = ProductRequest::findOrFail($id);

        $request->validate([
            'admin_notes' => 'required|string',
        ]);

        $productRequest->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
            'reviewed_at' => now(),
        ]);

        return redirect()->route('admin.product-requests.index')
            ->with('success', 'Product request rejected.');
    }

    private function addProductToTable(ProductRequest $productRequest)
    {
        $data = [
            'title' => $productRequest->title,
            'description' => $productRequest->description,
            'price' => $productRequest->price,
            'status' => 'in_stock',
        ];

        // Handle image
        if ($productRequest->image) {
            $data['image'] = $productRequest->image;
        }

        switch ($productRequest->product_type) {
            case 'tools':
                Tool::create($data);
                break;

            case 'fertilizer':
                Fertilizer::create($data);
                break;

            case 'crops':
                $data['name'] = $productRequest->title;
                $data['type'] = 'General'; // Default type
                $data['image_folder'] = $productRequest->image;
                unset($data['title']);
                Crop::create($data);
                break;
        }
    }
}