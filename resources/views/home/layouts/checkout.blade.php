@extends('home.layouts.template')
@section('page_title')
    Home | Check Out
@endsection
@section('content')
    <div>
        <h2 class="text-center">Check out page</h2>
        @if (session('msg'))
            <div class="alert alert-success">
                <span>{{ session('msg') }}</span>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-5">
                <div class="box_main">
                    <h3>The Order where is deleiverd?</h3>
                    <div>
                        <h5>{{ $shippinginfo->name }}</h5>
                        <h5>{{ $shippinginfo->phone }}</h5>
                        <h5>{{ $shippinginfo->email }}</h5>
                        <h5>{{ $shippinginfo->cityname }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="box_main">

                    <div class="card">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Sl No</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($carts as $cart)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $cart->product_name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>{{ $cart->price }}</td>
                                        <td>{{ $cart->total_price }}</td>
                                    </tr>
                                    @php
                                        $total = $total + $cart->total_price;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <h4 class="text-center text-danger">Gross Total Price: {{ $total }}</h4>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex ">
                            <form action="">
                                <button type="submit" class="btn btn-danger mr-2">Cancel</button>
                            </form>
                            <form action="{{ route('client.placeorder') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
