@extends('home.layouts.template')
@section('page_title')
    Home | Shipping Addres
@endsection
@section('content')
    <div class="box_main">
        <h2 class="text-center">Shipping Information</h2>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="card w-75 mx-auto p-3">
            <form action="{{ route('client.storeshippingaddress') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" class="w-100 p-1" name="phone" placeholder="Your Phone">
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="w-100 p-1" name="email" value="{{ Auth::user()->email }}">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="w-100 p-1" name="name" value="{{ Auth::user()->name }}"
                        placeholder="Your Name">
                </div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">City Name</label>
                    <input type="text" class="w-100 p-1" name="cityname" placeholder="Your City Name" required>
                </div>
                @error('cityname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="mb-3">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="w-100 p-1" name="postalcode" placeholder="Your Postal Code" required>
                </div>
                @error('postalcode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

                <div class="text-center">
                    <button type="submit" class="btn btn-info w-25">Next</button>
                </div>
            </form>
        </div>
    </div>
@endsection
