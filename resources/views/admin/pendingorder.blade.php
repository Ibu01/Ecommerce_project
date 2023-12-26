@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Pending Order
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Pending Order</h4>
        <div class="card">
            <h5 class="card-header text-center">Available Pending Order</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Phone</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pendingorders as $pending)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $pending->user_name }}</td>
                                <td>{{ $pending->product_name }}</td>
                                <td>{{ $pending->shipping_phone }}</td>
                                <td>{{ $pending->product_quantity }}</td>
                                <td>{{ $pending->price }}</td>
                                <td>{{ $pending->total_price }}</td>
                                <td>{{ $pending->status }}</td>
                                <td>
                                    <form action="{{ route('admin.confirm', ['pending' => $pending]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning">Confirm</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
