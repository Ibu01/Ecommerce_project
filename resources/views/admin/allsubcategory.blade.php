@extends('admin.layouts.template')
@section('page_title')
    Dashboard - All Sub Category
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Page/</span>All Sub Category</h4>

        @if (session('msg'))
            <div class="alert alert-danger">
                <p class="text-primary"> {{ session('msg') }}</p>
            </div>
        @endif
        <div class="card">
            <h5 class="card-header text-center">Available Sub Category Info</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Sub Category Name</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $data->subcategory_name }}</td>
                                <td>{{ $data->category_name }}</td>
                                <td>{{ $data->product_count }}</td>
                                <td class="d-flex gap-2">
                                    <form action="{{ route('admin.deletesubcategory', ['data' => $data]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('are you sure to delete this item??')">Delete</button>
                                    </form>
                                    <div>
                                        <a href="{{ route('admin.editsubcategory', ['data' => $data]) }}"
                                            class="btn btn-warning">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
