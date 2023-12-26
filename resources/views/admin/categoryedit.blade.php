@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Edit Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Edit Category</h4>

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
                    <small class="text-muted float-end">Input info</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.categoryupdate', ['data' => $data]) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="category_name"
                                    placeholder="Exm Electronics" value="{{ $data->category_name }}" />
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary bg-primary text-white mt-4">Update
                                        Category</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
