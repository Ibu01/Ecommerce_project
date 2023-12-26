@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Add Product
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product</h4>

        @if (session('msg'))
            <div class="alert alert-success">
                <p class="text-success">{{ session('msg') }}</p>
            </div>
        @endif

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
                    <small class="text-muted float-end">Input info</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.storeproduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                            <div class="col-sm-10 mb-4">
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                            <div class="col-sm-10 mb-4">
                                <input type="number" name="price" class="form-control" placeholder="Product Price" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
                            <div class="col-sm-10 mb-4">
                                <input type="file" class="form-control" name="product_img" placeholder="Product image" />
                            </div>


                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                            <div class="col-sm-10 mb-4">
                                <input type="number" class="form-control" name="quantity" placeholder="Product Quantity" />
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short
                                Description</label>
                            <div class="col-sm-10 mb-4">
                                <textarea name="product_short_des" id="" class="form-control"></textarea>
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                            <div class="col-sm-10 mb-4">
                                <textarea name="product_long_des" id="" class="form-control"></textarea>
                            </div>


                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10 mb-4">
                                <select name="product_category_id" class="form-select">
                                    @foreach ($categorydata as $categorydata)
                                        <option value="{{ $categorydata->id }}">{{ $categorydata->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                            <div class="col-sm-10">
                                <select name="product_subcategory_id" class="form-select">
                                    @foreach ($subcategorydata as $subcategorydata)
                                        <option value="{{ $subcategorydata->id }}">{{ $subcategorydata->subcategory_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary bg-primary text-white mt-4">Add
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
