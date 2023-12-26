@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Product
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Product</h4>
        @if (session('msg'))
            <div class="alert alert-warning">
                <p class="text-dark">{{ session('msg') }}</p>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header text-center">Available Product Info</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->product_category_name }}</td>
                                <td>
                                    <div>
                                        <img src="{{ asset($data->product_img) }}" alt=""
                                            style="width: 55px;height:55px;border-radius:100%">
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.editproductimg', ['data' => $data]) }}"
                                            class="btn btn-primary btn-sm bg-primary text-white mt-2">Update
                                            Image</a>
                                    </div>
                                </td>
                                <td>{{ $data->price }}</td>
                                <td class="d-flex justify-content-center align-items-center gap-2">
                                    <div>
                                        <a href="{{ route('admin.editproduct', ['data' => $data]) }}"
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                    <form action="{{ route('admin.deleteproduct', ['data' => $data]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Are you sure to delete this??')">Delete</button>
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
