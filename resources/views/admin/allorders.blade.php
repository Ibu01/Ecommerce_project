@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Order
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Order</h4>
        <div class="card">
            <h5 class="card-header text-center">Available All Order</h5>
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
                        @foreach ($allorders as $allorder)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $allorder->user_name }}</td>
                                <td>{{ $allorder->product_name }}</td>
                                <td>{{ $allorder->shipping_phone }}</td>
                                <td>{{ $allorder->product_quantity }}</td>
                                <td>{{ $allorder->price }}</td>
                                <td>{{ $allorder->total_price }}</td>
                                <td>{{ $allorder->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
