<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $allproducts = Product::where('product_name','LIKE', "%$search%")
                                    ->orwhere('product_category_name','LIKE',"%$search%")
                                    ->orwhere('product_long_des','LIKE',"%$search%")
                                    ->get();
            
        }
        else 
        {
            $allproducts = Product::latest()->get();
        }
       
        return view('home.layouts.home',['allproducts'=>$allproducts,'search'=>$search]);
    }
}
