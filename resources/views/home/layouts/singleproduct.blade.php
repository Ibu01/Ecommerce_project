@extends('home.layouts.template')
@section('page_title')
    Home | Single Product
@endsection
@section('content')
    <div class="">
        <h1 class="text-center">Single Product Details</h1>
        @if (session('msg'))
            <div class="alert alert-success">
                <span class="text-center">{{ session('msg') }}</span>
            </div>
        @endif
        <div class="card mb-3 mx-auto p-3 ">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset($product->product_img) }}" style="" class="img-fluid rounded-start"
                        alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body" style="padding: 0rem">
                        <h3>{{ $product->product_name }}</h3>
                        <h4 style="font-size: 23px"><small class="text-muted">Price:{{ $product->price }}</small></h4>
                        <h6>
                            <span>{{ $product->product_long_des }}</span>
                        </h6>
                        <h6>Category: {{ $product->product_category_name }}</h6>
                        <h6>Subcategory: {{ $product->product_subcategory_name }}</h6>
                        <h5>Quantity: {{ $product->quantity }}</h5>
                    </div>
                    <div class="btn_main">
                        <form action="{{ route('client.addtocart', ['product' => $product]) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">How Much do you want?</label>
                                <input class="form-control" type="number" min="1" placeholder="1" name="quantity">
                            </div>
                            <input class="btn btn-primary" type="submit" value="Add To Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <h2>Releted Products</h2>
        <div class="row">
            @foreach ($relatedproduct as $product)
                <div class="col-lg-4 col-sm-4">
                    <div class="box_main">
                        <h4 class="shirt_text">{{ $product->product_name }}</h4>
                        <p class="price_text">Price <span style="color: #262626;">{{ $product->price }}</span>
                        </p>
                        <div class="tshirt_img" style="min-height: 200px!important;margin:0px">
                            <img src="{{ asset($product->product_img) }}">
                        </div>
                        <span>Quantity:{{ $product->quantity }}</span>
                        <div class="btn_main">
                            <div class="btn_main">
                                <form action="{{ route('client.addtocart', ['product' => $product]) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input class="form-control" type="number" min="1" placeholder="1"
                                            name="quantity">
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Add To Cart">
                                </form>
                            </div>
                            <div class="seemore_bt"><a
                                    href="{{ route('client.singleproduct', ['product' => $product]) }}">See
                                    More</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
