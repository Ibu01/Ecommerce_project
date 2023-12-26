@extends('home.layouts.userprofiletemplate')
@section('userprofilecontent')
    <div class="card-body">
        <h4 class="text-center">ALl Orders</h4>
        <div class="m-2">
            <div class="card w-100">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">SL No</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"> Price</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $orders)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $orders->user_name }}</td>
                                <td>{{ $orders->product_name }}</td>
                                <td>{{ $orders->product_quantity }}</td>
                                <td>{{ $orders->price }}</td>
                                <td>{{ $orders->total_price }}</td>
                                <td>{{ $orders->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
