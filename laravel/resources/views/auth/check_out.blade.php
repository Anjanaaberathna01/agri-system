<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Govi Saviya LK</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Poppins', sans-serif; background: #f5f7fa; min-height: 100vh; }
        .container { max-width: 1100px; margin: 0 auto; padding: 40px 20px; }
        .header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 15px; margin-bottom: 40px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header h1 { font-size: 32px; font-weight: 700; margin-bottom: 5px; }
        .header p { font-size: 14px; opacity: 0.9; }
        .checkout-layout { display: grid; grid-template-columns: 2fr 1fr; gap: 30px; }
        .user-details, .order-summary { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; }
        .user-details h2, .order-summary h2 { font-size: 20px; font-weight: 700; color: #333; margin-bottom: 20px; }
        .user-info { margin-bottom: 20px; }
        .user-info label { font-weight: 600; color: #555; display: block; margin-bottom: 2px; }
        .user-info input, .user-info textarea { width: 100%; padding: 10px; border: 2px solid #e0e0e0; border-radius: 6px; margin-bottom: 12px; font-size: 14px; }
        .user-info input[readonly] { background: #f5f5f5; color: #888; }
        .order-items { margin-bottom: 20px; }
        .order-item { display: flex; align-items: center; gap: 18px; border-bottom: 1px solid #f0f0f0; padding: 16px 0; }
        .order-item:last-child { border-bottom: none; }
        .item-image { width: 70px; height: 70px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 36px; color: white; }
        .item-details { flex: 1; }
        .item-details h4 { font-size: 15px; font-weight: 600; color: #333; margin-bottom: 2px; }
        .item-details .item-type { font-size: 12px; color: #667eea; background: #f0f0ff; border-radius: 4px; padding: 2px 8px; margin-right: 8px; }
        .item-details .item-qty { font-size: 12px; color: #888; }
        .item-price { font-size: 15px; font-weight: 600; color: #28a745; }
        .order-summary .summary-row { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 14px; }
        .order-summary .summary-row.total { font-size: 18px; font-weight: 700; color: #333; padding-top: 15px; border-top: 2px solid #f0f0f0; margin-top: 15px; }
        .order-summary .summary-row.total .price { color: #667eea; }
        .payment-section { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        .payment-section h2 { font-size: 20px; font-weight: 700; color: #333; margin-bottom: 20px; }
        .payment-options { display: flex; gap: 20px; margin-bottom: 20px; }
        .payment-option { flex: 1; border: 2px solid #e0e0e0; border-radius: 10px; padding: 18px; text-align: center; cursor: pointer; transition: border 0.3s; background: #fafbff; }
        .payment-option.selected, .payment-option:hover { border-color: #667eea; background: #f0f0ff; }
        .payment-option img { width: 40px; height: 28px; margin-bottom: 8px; }
        .payment-option .option-title { font-size: 15px; font-weight: 600; color: #333; }
        .payment-fields { margin-top: 18px; }
        .payment-fields label { font-weight: 600; color: #555; display: block; margin-bottom: 2px; }
        .payment-fields input { width: 100%; padding: 10px; border: 2px solid #e0e0e0; border-radius: 6px; margin-bottom: 12px; font-size: 14px; }
        .place-order-btn { width: 100%; padding: 15px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 8px; font-size: 16px; font-weight: 600; cursor: pointer; transition: all 0.3s ease; margin-top: 20px; box-shadow: 0 4px 15px rgba(102,126,234,0.2); }
        .place-order-btn:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(102,126,234,0.3); }
        @media (max-width: 900px) { .checkout-layout { grid-template-columns: 1fr; } }
    </style>
</head>
<body>
    @include('layouts.nav')
    <div class="container">
        <div class="header">
            <h1>Checkout</h1>
            <p>Review your order and complete your purchase</p>
        </div>
        <form action="{{ route('checkout.place') }}" method="POST" id="checkoutForm" onsubmit="return handleCODBudget();">
            @csrf
            <div class="checkout-layout">
                <!-- Left: User Details & Order Items -->
                <div>
                    <div class="user-details">
                        <h2>User Details</h2>
                        <div class="user-info">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->first_name ?? '' }} {{ Auth::user()->last_name ?? '' }}" readonly>
                            <label>Email</label>
                            <input type="email" name="email" value="{{ Auth::user()->email ?? '' }}" readonly>
                            <label>Phone</label>
                            <input type="text" name="phone" value="{{ Auth::user()->phone ?? '' }}" readonly>
                            <label>Address</label>
                            <textarea name="address" rows="2" readonly>{{ Auth::user()->address ?? '' }}, {{ Auth::user()->city ?? '' }}, {{ Auth::user()->state ?? '' }}, {{ Auth::user()->postal_code ?? '' }}</textarea>
                        </div>
                    </div>
                    <div class="order-summary">
                        <h2>Order Items</h2>
                        <div class="order-items">
                            @foreach($cart as $item)
                                <div class="order-item">
                                    <div class="item-image">
                                        @php
                                            $imageFolder = $item['type'] === 'tool' ? 'tools' : ($item['type'] === 'fertilizer' ? 'fertilizer' : 'crop');
                                            $itemSubfolder = isset($item['name']) ? strtolower($item['name']) : '';
                                            $imageFile = !empty($item['image']) ? $item['image'] : '1.jpg';
                                        @endphp
                                        <img src="{{ asset('images/' . $imageFolder . '/' . $itemSubfolder . '/' . $imageFile) }}" alt="{{ $item['name'] }}" style="width:70px;height:70px;border-radius:10px;object-fit:cover;">
                                    </div>
                                    <div class="item-details">
                                        <h4>{{ $item['name'] }}</h4>
                                        <span class="item-type">{{ ucfirst($item['type']) }}</span>
                                        <span class="item-qty">x{{ $item['quantity'] }}</span>
                                    </div>
                                    <div class="item-price">Rs. {{ number_format($item['price'], 2) }}</div>
                                </div>
                            @endforeach
                        </div>
                        <div class="summary-row">
                            <span>Subtotal</span>
                            <span>Rs. {{ number_format($total, 2) }}</span>
                        </div>
                        <div class="summary-row">
                            <span>Shipping</span>
                            <span>Rs. 0.00</span>
                        </div>
                        <div class="summary-row">
                            <span>Tax</span>
                            <span>Rs. 0.00</span>
                        </div>
                        <div class="summary-row" id="cod-budget-row" style="display:none;">
                            <span>Cash on Delivery Fee</span>
                            <span id="cod-budget">Rs. 200.00</span>
                        </div>
                        <div class="summary-row total">
                            <span>Total</span>
                            <span class="price" id="total-price">Rs. {{ number_format($total, 2) }}</span>
                        </div>
                    </div>
                </div>
                <!-- Right: Payment Section -->
                <div>
                    <div class="payment-section">
                        <h2>Payment Method</h2>
                        <div class="payment-options">
                            <div class="payment-option" id="visaOption" onclick="selectPayment('visa')">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/41/Visa_Logo.png" alt="Visa">
                                <div class="option-title">Visa Card</div>
                                <input type="radio" name="payment_method" value="visa" style="display:none;">
                            </div>
                            <div class="payment-option" id="paypalOption" onclick="selectPayment('paypal')">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal">
                                <div class="option-title">PayPal</div>
                                <input type="radio" name="payment_method" value="paypal" style="display:none;">
                            </div>
                            <div class="payment-option" id="codOption" onclick="selectPayment('cod')">
                                <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png" alt="Cash on Delivery" style="width:32px;height:32px;">
                                <div class="option-title">Cash on Delivery</div>
                                <input type="radio" name="payment_method" value="cod" style="display:none;">
                            </div>
                        </div>
                        <div class="payment-fields" id="visaFields" style="display:none;">
                            <label>Card Number</label>
                            <input type="text" name="card_number" maxlength="19" placeholder="1234 5678 9012 3456">
                            <label>Expiry Date</label>
                            <input type="text" name="expiry" maxlength="5" placeholder="MM/YY">
                            <label>CVV</label>
                            <input type="text" name="cvv" maxlength="4" placeholder="123">
                        </div>
                        <div class="payment-fields" id="paypalFields" style="display:none;">
                            <label>PayPal Email</label>
                            <input type="email" name="paypal_email" placeholder="your@email.com">
                        </div>
                        <div class="payment-fields" id="codFields" style="display:none;">
                            <p style="color:#28a745;font-weight:600;">You will pay in cash upon delivery. Rs. 200 will be added to your total as a budget fee.</p>
                        </div>
                        <button type="submit" class="place-order-btn">Place Order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        let selected = null;
        let baseTotal = {{ $total }};
        function selectPayment(method) {
            document.getElementById('visaOption').classList.remove('selected');
            document.getElementById('paypalOption').classList.remove('selected');
            document.getElementById('codOption').classList.remove('selected');
            document.getElementById('visaFields').style.display = 'none';
            document.getElementById('paypalFields').style.display = 'none';
            document.getElementById('codFields').style.display = 'none';
            document.getElementById('cod-budget-row').style.display = 'none';
            document.getElementById('total-price').innerText = 'Rs. ' + baseTotal.toFixed(2);
            if(method === 'visa') {
                document.getElementById('visaOption').classList.add('selected');
                document.getElementById('visaFields').style.display = 'block';
                document.querySelector('input[name="payment_method"][value="visa"]').checked = true;
            } else if(method === 'paypal') {
                document.getElementById('paypalOption').classList.add('selected');
                document.getElementById('paypalFields').style.display = 'block';
                document.querySelector('input[name="payment_method"][value="paypal"]').checked = true;
            } else if(method === 'cod') {
                document.getElementById('codOption').classList.add('selected');
                document.getElementById('codFields').style.display = 'block';
                document.querySelector('input[name="payment_method"][value="cod"]').checked = true;
                document.getElementById('cod-budget-row').style.display = 'flex';
                document.getElementById('total-price').innerText = 'Rs. ' + (baseTotal + 200).toFixed(2);
            }
        }

        function handleCODBudget() {
            var paymentMethod = document.querySelector('input[name="payment_method"]:checked');
            if(paymentMethod && paymentMethod.value === 'cod') {
                // Optionally, you can add a hidden input to send the extra fee to backend
                if(!document.getElementById('cod_fee')) {
                    var input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'cod_fee';
                    input.value = '200';
                    input.id = 'cod_fee';
                    document.getElementById('checkoutForm').appendChild(input);
                }
            }
            return true;
        }
    </script>
</body>
</html>
