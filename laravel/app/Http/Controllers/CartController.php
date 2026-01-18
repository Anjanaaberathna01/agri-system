<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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

    /**
     * Place order
     */
    public function placeOrder(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string|in:visa,paypal,cod',
            'cod_fee' => 'nullable|numeric',
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        // Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $codFee = $validated['payment_method'] === 'cod' ? ($validated['cod_fee'] ?? 200) : 0;

        // Generate unique order number
        $orderNumber = 'ORD-' . strtoupper(uniqid());

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_number' => $orderNumber,
            'total_amount' => $total,
            'cod_fee' => $codFee,
            'payment_method' => $validated['payment_method'],
            'status' => 'pending',
            'items' => $cart,
            'shipping_address' => auth()->user()->address . ', ' . auth()->user()->city . ', ' . auth()->user()->state . ', ' . auth()->user()->postal_code,
            'phone' => auth()->user()->phone,
        ]);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Order placed successfully! Order Number: ' . $orderNumber);
    }

    /**
     * View user orders
     */
    public function orders()
    {
        $orders = Order::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('auth.order', compact('orders'));
    }

    /**
     * Admin view specific order
     */
    public function viewOrder($id)
    {
        $order = Order::with('user')->findOrFail($id);
        
        // Check if user is admin or order belongs to user
        if (auth()->user()->role !== 'admin' && $order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        return view('admin.view_order', compact('order'));
    }

    /**
     * Admin update order status
     */
    public function updateOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        // Verify user is admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'status' => 'required|string|in:pending,processing,completed,cancelled',
        ]);

        $order->update(['status' => $validated['status']]);

        return redirect()->back()->with('success', 'Order status updated to ' . ucfirst($validated['status']));
    }

    /**
     * Admin view all orders
     */
    public function adminOrders()
    {
        // Verify user is admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $orders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.orders', compact('orders'));
    }

    /**
     * Cancel order
     */
    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found!');
        }

        if ($order->status === 'cancelled') {
            return redirect()->back()->with('error', 'Order is already cancelled!');
        }

        if (in_array($order->status, ['completed', 'processing'])) {
            return redirect()->back()->with('error', 'Cannot cancel order in ' . $order->status . ' status!');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Order cancelled successfully!');
    }
}
