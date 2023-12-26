@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Category</h4>
        @if (session('msg'))
            <div class="alert alert-danger">
                <p class="text-danger mt-3">{{ session('msg') }}</p>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header text-center">Available Category Info</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td>{{ $data->subcategory_count }}</td>
                                <td>{{ $data->product_count }}</td>
                                <td class="d-flex gap-2">
                                    <div>
                                        <a href="{{ route('admin.categoryedit', ['data' => $data]) }}"
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                    <form action="{{ route('admin.deleteallcategory', ['data' => $data]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are You sure to delete this??')"
                                            class="btn btn-danger">Delete</button>
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
