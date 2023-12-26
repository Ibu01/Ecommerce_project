<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()  {
        $data= Product::latest()->get();
        return view('admin.product',['data'=>$data]);
    }

    public function addproduct()  {
        $categorydata = Category::all();
        $subcategorydata = Subcategory::all();
        return view('admin.addproduct',['categorydata'=>$categorydata,'subcategorydata'=>$subcategorydata]);
    }

    public function storeproduct(Request $request) {
          $request->validate([
            'product_name'=>'required',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'product_category_id'=>'required',
            'product_subcategory_id'=>'required',
            'product_img'=>'required',
        ]);

        $productname = $request->product_name;
        $categoryid = $request->product_category_id;
        $subcategoryid = $request->product_subcategory_id;
        $productshortdes = $request->product_short_des;
        $productlongdes = $request->product_long_des;
        $productprice = $request->price;
        $productcategoryname = Category::where('id',$categoryid)->value('category_name');
        $productsubcategoryname = Subcategory::where('id',$subcategoryid)->value('subcategory_name');

        $image = $request->file('product_img');
        $imagename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$imagename);
        $imageurl = 'upload/'.$imagename;

        Product::insert([
            'product_name'=>$productname,
            'product_short_des'=>$productshortdes,
            'product_long_des'=>$productlongdes,
            'price'=>$productprice,
            'product_category_id'=>$categoryid,
            'product_subcategory_id'=>$subcategoryid,
            'product_category_name'=>$productcategoryname,
            'product_subcategory_name'=>$productsubcategoryname,
            'product_img'=>$imageurl,
            'quantity'=>$request->quantity,
            'slug' => strtolower(str_replace(' ','-', $productname)),
        ]);

        Category::where('id',$categoryid)->increment('product_count',1);
        Subcategory::where('id', $subcategoryid)->increment('product_count',1);

        return redirect(route('admin.addproduct'))->with('msg','Product added successfully...');
    }

    public function editproductimg(Product $data)  {
        return view('admin.editproductimg',['data'=>$data]);
    }

    public function updateproductimg(Request $request,Product $data) {
        $request->validate([
            'product_img'=>'required'
        ]);

        $image = $request->file('product_img');
        $imagename = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$imagename);
        $imageurl = 'upload/'.$imagename;

        $data->update([
           'product_img'=>$imageurl,
        ]);

        return redirect(route('admin.allproduct'))->with('msg','Image updated successfully...');
    }


    public function deleteproduct(Product $data) {
       
        // $categoryid = Product::where('id',$data->id)->value('product_category_id');
        // $subcategoryid = Product::where('id', $data->id)->value('product_subcategory_id');

        $categoryid1 = $data->product_category_id;
        $subcategoryid1 = $data->product_subcategory_id;

        $data->delete();

        Category::where('id',$categoryid1)->decrement('product_count',1);
        Subcategory::where('id', $subcategoryid1)->decrement('product_count',1);

        return redirect()->back()->with('msg','Product Deleted successfully...');
    }

//     public function deleteProduct(Product $data) {
//     // Check if the product exists
//     if ($data) {
//         $categoryId = $data->product_category_id;
//         $subcategoryId = $data->product_subcategory_id;

//         // Delete the product
//         $data->delete();

//         // Decrement product_count for category and subcategory if IDs are valid
//         if ($categoryId) {
//             Category::where('id', $categoryId)->decrement('product_count', 1);
//         }

//         if ($subcategoryId) {
//             Subcategory::where('id', $subcategoryId)->decrement('product_count', 1);
//         }

//         return redirect()->back()->with('msg', 'Product deleted successfully.');
//     } else {
//         return redirect()->back()->with('error', 'Product not found.');
//     }
// }


    public function editproduct(Product $data)  {
        return view('admin.productedit',['data'=>$data]);
    }

    public function updateproduct(Request $request,Product $data)  {
         $request->validate([
            'product_name'=>'required',
            'product_short_des'=>'required',
            'product_long_des'=>'required',
            'price'=>'required',
            'quantity'=>'required',
        ]);

        $productname = $request->product_name;
        $productshortdes = $request->product_short_des;
        $productlongdes = $request->product_long_des;
        $productprice = $request->price;
    
        $data->update([
            'product_name'=>$productname,
            'product_short_des'=>$productshortdes,
            'product_long_des'=>$productlongdes,
            'price'=>$productprice,
            'quantity'=>$request->quantity,
            'slug' => strtolower(str_replace(' ','-', $productname)),
        ]);

        return redirect(route('admin.allproduct'))->with('msg','Product Updated successfully...');
    }

    
}
