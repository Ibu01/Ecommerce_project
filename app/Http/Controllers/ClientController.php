<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function category(Category $category) {
        $products = Product::where('product_category_id',$category->id)->get();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return view('home.layouts.category',['category'=>$category,'products'=>$products,'subcategories'=>$subcategories]);
    }

    public function newrelease()  {
        return view('home.layouts.newrelease');
    }

    public function todaysdeals() {
        return view('home.layouts.todaysdeals');
    }

    public function customerservices()  {
        return view('home.layouts.customerservices');
    }

    public function subcategory(Subcategory $subcategory)  {
        $products =Product::where('product_subcategory_id',$subcategory->id)->get();
        return view('home.layouts.subcategory',['subcategory'=>$subcategory,'products'=>$products]);
    }
   
    public function singleproduct(Product $product)  {
        $productid = Product::where('id',$product->id)->value('product_category_id');
        $relatedproduct =Product::where('product_category_id',$productid)->get();
        return view('home.layouts.singleproduct',['product'=>$product,'relatedproduct'=>$relatedproduct]);
    }

    public function userprofile() {
       $userid = Auth::id();
       $allorders = Order::where('status','confirmed')
                                ->where('user_id', $userid)
                                ->get();
        return view('home.layouts.userprofile',['allorders'=>$allorders]);
    }

    public function orderprofile()  {
       $userid = Auth::id();
       $orders = Order::where('user_id',$userid)->get();
       return view('home.layouts.orderitem',['orders'=>$orders]);
    }

    public function orderhistory() {
        return view('home.layouts.history');
    }

    public function pendingorder() {
        $userid = Auth::id();
        $pendingorders = Order::where('status','pending')
                                ->where('user_id', $userid)
                                ->get();
        return view('home.layouts.pendingorder',['pendingorders'=>$pendingorders]);
    }




    public function addtocart(Request $request, Product $product) {
    $request->validate([
        'quantity' => 'required|numeric|min:1', 
    ]);

    $productname = $product->product_name;
    $productid = $product->id;
    $productcategoryid = $product->product_category_id;
    $userid = Auth::id();
    $requestedQuantity = $request->quantity;
    $price = $product->price;
    $totalprice = $price * $requestedQuantity;
    $productquantity = $product->quantity;

    if ($productquantity >= $requestedQuantity) {
        Cart::insert([
            'product_name' => $productname,
            'product_id' => $productid,
            'category_id' => $productcategoryid,
            'user_id' => $userid,
            'quantity' => $requestedQuantity,
            'price' => $price,
            'total_price' => $totalprice,
        ]);

           $product->quantity -= $requestedQuantity;
           $product->save();

             return redirect()->back()->with('msg', 'Added to Cart successfully.');
          } else {
             return redirect()->back()->with('msg', 'Not enough stock available.');
           }
    }

   
   public function displayproduct()  {
     $authuserid = Auth::id();
     $carts = Cart::where('user_id',$authuserid)->get();
     return view('home.layouts.displayproduct',['carts'=>$carts]);
   }

   public function deletecartitems(Cart $cart)  {
      $cart->delete();
      return redirect()->back()->with('message','Product Deleted ...');
   }

   public function shippinginfo() {
    return view('home.layouts.shipping');
   }

   public function storeshippingaddress(Request $request) {
      $request->validate([
        'phone' => 'required', 
        'email'=>'nullable',
        'name'=>'required',
        'cityname'=>'nullable',
        'postalcode'=>'nullable',
    ]);

    $phonenumber = $request->phone;
    $email = $request->email;
    $name = $request->name;
    $cityname = $request->cityname;
    $postalcode = $request->postalcode;

    $userid = Auth::id();

    ShippingInfo::insert([
     'phone'=>$phonenumber,
     'email'=>$email,
     'name'=>$name,
     'cityname'=>$cityname,
     'postalcode'=>$postalcode,
     'user_id'=>$userid,
    ]);

    return redirect(route('client.checkout'))->with('message','Shipping adrress submitted successfully...');

   }

   public function checkout() {
    $userid = Auth::id();
    $shippinginfo = ShippingInfo::where('user_id',$userid)->first();
    $carts = Cart::where('user_id',$userid)->get();
    return view('home.layouts.checkout',['shippinginfo'=>$shippinginfo,'carts'=>$carts]);
   }


public function placeorder() {
    $userid = Auth::id();
    $shippinginfo = ShippingInfo::where('user_id', $userid)->first();
    $carts = Cart::where('user_id', $userid)->get();

    foreach ($carts as $cart) {
        Order::insert([
            'user_name' => $shippinginfo->name,
            'product_name' => $cart->product_name,
            'user_id' => $userid,
            'product_id' => $cart->product_id,
            'product_quantity' => $cart->quantity,
            'shipping_phone' => $shippinginfo->phone,
            'shipping_postalcode' => $shippinginfo->postalcode,
            'total_price' => $cart->total_price,
            'status'=>'pending',
            'price'=>$cart->price,
        ]);

        $cartToDelete = Cart::find($cart->id);
        if ($cartToDelete) {
            $cartToDelete->delete();
        }
    }

    $shippingInfoToDelete = ShippingInfo::where('user_id', $userid)->first();
    if ($shippingInfoToDelete) {
        $shippingInfoToDelete->delete();
    }

    return redirect(route('client.pendingorder'))->with('msg', 'Your Order is submitted..Hi Five');
}

}
