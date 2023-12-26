@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Complete Order
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Completed Order</h4>
        <div class="card">
            <h5 class="card-header text-center">Available Completed Order</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>User</th>
                            <th>Product</th>
                            <th>Phone</th>
                            <th>Quantity </th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($completedgorders as $completedgorder)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $completedgorder->user_name }}</td>
                                <td>{{ $completedgorder->product_name }}</td>
                                <td>{{ $completedgorder->shipping_phone }}</td>
                                <td>{{ $completedgorder->product_quantity }}</td>
                                <td>{{ $completedgorder->price }}</td>
                                <td>{{ $completedgorder->total_price }}</td>
                                <td>{{ $completedgorder->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
