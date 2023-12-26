@extends('home.layouts.template')
@section('page_title')
    Home | Homepage
@endsection
@section('content')
    <!-- fashion section start -->
    <div class="fashion_section">
        <div id="main_slider">
            <div class="container">

                <h1 class="fashion_taital">All Products</h1>
                @if (session('msg'))
                    <div class="alert alert-success">
                        <span class="text-center">{{ session('msg') }}</span>
                    </div>
                @endif
                <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($allproducts as $product)
                            <div class="col-lg-4 col-sm-4">
                                <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                    <p class="price_text">Price <span style="color: #262626;">{{ $product->price }}</span>
                                    </p>
                                    <div class="tshirt_img" style="min-height: 200px!important;margin:0px"><img
                                            src="{{ asset($product->product_img) }}">
                                    </div>
                                    <span>Quantity: {{ $product->quantity }}</span>
                                    <div class="btn_main">

                                        <div class="btn_main">
                                            <form action="{{ route('client.addtocart', ['product' => $product]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input class="form-control" type="number" min="1"
                                                        placeholder=" quantity" name="quantity" required value="1">
                                                </div>
                                                <input class="btn btn-warning " type="submit" value="Buy Now">
                                            </form>
                                        </div>

                                        <div class="seemore_bt"><a
                                                href="{{ route('client.singleproduct', ['product' => $product]) }}">See
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- fashion section end -->
@endsection
