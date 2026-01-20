<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    /**
     * Display all suppliers.
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('created_at', 'desc')->get();
        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the create supplier form.
     */
    public function create()
    {
        return view('admin.suppliers.create');
    }

    /**
     * Store a new supplier.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255', 'unique:suppliers,email'],
            'phone'         => ['required', 'string', 'max:50'],
            'product_type'  => ['required', 'in:tools,fertilizer,crops'],
            'id_number'     => ['required', 'string', 'max:100'],
            'country'       => ['required', 'string', 'max:120'],
        ]);

        // Set default password
        $data['password'] = Hash::make('12345678');
        $data['must_change_password'] = true;

        Supplier::create($data);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier added successfully. Default password: 12345678');
    }

    /**
     * Show the edit supplier form.
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the supplier.
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);

        $data = $request->validate([
            'first_name'    => ['required', 'string', 'max:255'],
            'last_name'     => ['required', 'string', 'max:255'],
            'email'         => ['required', 'email', 'max:255', 'unique:suppliers,email,' . $id],
            'phone'         => ['required', 'string', 'max:50'],
            'product_type'  => ['required', 'in:tools,fertilizer,crops'],
            'id_number'     => ['required', 'string', 'max:100'],
            'country'       => ['required', 'string', 'max:120'],
        ]);

        $supplier->update($data);

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    /**
     * Delete the supplier.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()
            ->route('admin.suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
}
