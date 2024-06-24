@extends('shop')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Checkout</h2>
    @if (count($cartItems) > 0)
        <div class="row">
            <div class="col-md-8">
                <!-- Display order details here -->
                <h4>Order Summary</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>${{ $item['price'] }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>${{ $item['price'] * $item['quantity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <!-- Payment options -->
                <h4>Payment Method</h4>
                <p>Select a payment method:</p>
                <form action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="cash_on_delivery" checked>
                        <label class="form-check-label" for="cash_on_delivery">Cash on Delivery</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="stripe" value="stripe">
                        <label class="form-check-label" for="stripe">Stripe</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                        <label class="form-check-label" for="paypal">PayPal</label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Place Order</button>
                </form>
            </div>
        </div>
    @else
        <div class="text-center">
            <p>Your cart is empty.</p>
            <a href="{{ url('/home') }}" class="btn btn-primary">Continue Shopping</a>
        </div>
    @endif
</div>
@endsection
