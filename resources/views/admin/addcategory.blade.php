@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Add Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Product</h4>

        @if (session('msg'))
            <div class="alert alert-danger">
                <p class="text-primary"> {{ session('msg') }}</p>
            </div>
        @endif

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Category</h5>
                    <small class="text-muted float-end">Input info</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.storecategory') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Exm Electronics" />
                            </div>

                            @error('category_name')
                                <p class="text-danger" style="margin-left: 160px">{{ $message }}</p>
                            @enderror

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary bg-primary text-white mt-4">Add
                                        Category</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
