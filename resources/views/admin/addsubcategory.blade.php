@extends('admin.layouts.template')
@section('page_title')
    Dashboard - Add Sub Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>Add Sub Category</h4>
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Sub Category</h5>
                    <small class="text-muted float-end">Input info</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.storesubcategory') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Sub Category Name</label>
                            <div class="col-sm-10 mb-4">
                                <input type="text" class="form-control" name="subcategory_name"
                                    placeholder="Sub Category" />
                            </div>


                            <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                            <div class="col-sm-10">
                                <select name="category_id"class="form-select">
                                    @foreach ($data as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary bg-primary text-white mt-4">Add Sub
                                        Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
