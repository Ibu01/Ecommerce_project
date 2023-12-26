@extends('home.layouts.userprofiletemplate')
@section('userprofilecontent')
    <div class="card-body">
        <h4 class="text-center">Completed Orders</h4>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allorders as $allorder)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $allorder->user_name }}</td>
                                <td>{{ $allorder->product_name }}</td>
                                <td>{{ $allorder->product_quantity }}</td>
                                <td>{{ $allorder->price }}</td>
                                <td>{{ $allorder->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
