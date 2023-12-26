@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Edit Product
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Product</h4>

        @if (session('msg'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('msg') }}</p>
            </div>
        @endif

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Product</h5>
                    <small class="text-muted float-end">Input info</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.updateproduct', ['data' => $data]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10 mb-4">
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name"
                                    value="{{ $data->product_name }}" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10 mb-4">
                                <input type="number" name="price" class="form-control" placeholder="Product Price"
                                    value="{{ $data->price }}" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10 mb-4">
                                <input type="number" class="form-control" name="quantity" placeholder="Product Quantity"
                                    value="{{ $data->quantity }}" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                Description</label>
                            <div class="col-sm-10 mb-4">
                                <textarea name="product_short_des" id="" class="form-control">{{ $data->product_short_des }}</textarea>
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                            <div class="col-sm-10 mb-4">
                                <textarea name="product_long_des" id="" class="form-control">{{ $data->product_long_des }}</textarea>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary bg-primary text-white mt-4">Update
                                        Product</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
