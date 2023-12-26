@extends('home.layouts.template')
@section('page_title')
    Home | Cart Product List
@endsection
@section('content')
    <div class="mt-4">
        <h2 class="text-center " style="margin-top: 10px">All Cart Product</h2>
        @if (session('message'))
            <div class="alert alert-success">
                <span>{{ session('message') }}</span>
            </div>
        @endif
        <p>Product added by: {{ Auth::user()->name }}</p>
        <div class="card mb-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($carts as $cart)
                        <tr>
                            @php
                                $products = App\Models\Product::where('id', $cart->product_id)->value('product_img');
                            @endphp

                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $cart->product_name }}</td>
                            <td>
                                <img src="{{ asset($products) }}" style="width: 60px;height:60px;border-radius:100%"
                                    alt="">
                            </td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>{{ $cart->total_price }}</td>
                            <td class="d-flex">
                                <form action="{{ route('client.deletecartitems', ['cart' => $cart]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"
                                        onclick="return confirm('Are You sure to delete this?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @php
                            $total = $total + $cart->total_price;
                        @endphp
                    @endforeach

                </tbody>

            </table>
            @if ($total > 0)
                <h4 class="text-center text-danger">Gross Total Price: {{ $total }}</h4>
                <div class="text-center mb-3">
                    <a href="{{ route('client.shippinginfo') }}" class="btn btn-primary w-25 ">Procced To Checkout</a>
                </div>
            @endif

        </div>
    </div>
@endsection
