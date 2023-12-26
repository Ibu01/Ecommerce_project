@extends('home.layouts.userprofiletemplate')
@section('userprofilecontent')
    <div>
        <h3 class="text-center">pending orders</h3>
        @if (session('msg'))
            <div class="alert alert-success">
                <span>{{ session('msg') }}</span>
            </div>
        @endif
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
                        @foreach ($pendingorders as $pending)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td>{{ $pending->user_name }}</td>
                                <td>{{ $pending->product_name }}</td>
                                <td>{{ $pending->product_quantity }}</td>
                                <td>{{ $pending->price }}</td>
                                <td>{{ $pending->total_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
