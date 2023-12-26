@extends('home.layouts.template')
@section('page_title')
    Home | User Profile
@endsection
@section('content')
    <div class="conatiner">
        <div class="card mx-auto mb-3 w-75">
            <div class="row g-0">
                <div class="col-md-3" style="margin-top:30px">
                    <ul class="p-3">
                        <li><a href="{{ route('client.userprofile') }}">Dashboard</a></li>
                        <li><a href="{{ route('client.orderprofile') }}">Order</a></li>
                        <li><a href="{{ route('client.pendingorder') }}">Pending Order</a></li>
                        <li><a href="">Cancel Order</a></li>
                        <li><a href="{{ route('client.orderhistory') }}">History</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    @yield('userprofilecontent')
                </div>
            </div>
        </div>
    </div>
@endsection
