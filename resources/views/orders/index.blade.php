@extends('shop')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Your Orders</h2>
    @if ($orders->count() > 0)
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->product_name }}</td>
                                <td>${{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>${{ $order->total }}</td>
                                <td>{{ $order->payment_method }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>Completed</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="text-center">
            <p>You have no orders.</p>
            <a href="{{ url('/home') }}" class="btn btn-primary">Start Shopping</a>
        </div>
    @endif
</div>
@endsection
