<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Show the checkout page.
     */

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('auth.check_out', compact('cart', 'total'));
    }

    /* Display the shopping cart
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return view('auth.cart', compact('cart', 'total'));
    }

    /**
     * Add item to cart
     */
    public function add(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string',
            'type' => 'required|string|in:tool,fertilizer,crop',
            'price' => 'required|numeric',
            'quantity' => 'integer|min:1',
        ]);

        $cart = session()->get('cart', []);
        $itemKey = $validated['type'] . '_' . $validated['id'];

        // Check if item already exists in cart
        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] += $validated['quantity'] ?? 1;
        } else {
            $cart[$itemKey] = [
                'id' => $validated['id'],
                'name' => $validated['name'],
                'type' => $validated['type'],
                'price' => $validated['price'],
                'quantity' => $validated['quantity'] ?? 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $validated['name'] . ' added to cart!');
    }

    /**
     * Remove item from cart
     */
    public function remove($itemKey)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$itemKey])) {
            unset($cart[$itemKey]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    /**
     * Update cart item quantity
     */
    public function update(Request $request, $itemKey)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$itemKey])) {
            $cart[$itemKey]['quantity'] = $validated['quantity'];
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared!');
    }

    /**
     * Get cart count for header
     */
    public function getCount()
    {
        $cart = session()->get('cart', []);
        return count($cart);
    }
}