<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()  {
        $data = Category::all();
        return view('admin.allcategory',['data'=>$data]);
    }
    
    public function addcategory() {
        return view('admin.addcategory');
    }

    public function storecategory(Request $request) {
         $validatedData = $request->validate([
        'category_name' => 'required|unique:categories',
    ]);

         $category = new Category();
         $category->category_name = $validatedData['category_name'];
         $category->slug = strtolower(str_replace(' ','-', $request->category_name));
         $category->save();
         return redirect(route('admin.addcategory'))->with('msg','Category added successfully...');
    }

    public function deleteallcategory(Category $data)  {
        $data->delete();
        return redirect()->back()->with('msg','Category deleted successfully....');
    }

    public function categoryedit(Category $data) {
        return view('admin.categoryedit',['data'=>$data]);
    }

    public function categoryupdate(Request $request)  {
        $validatedData = $request->validate([
        'category_name' => 'required|unique:categories',
    ]);

         $data = new Category();
         $data->category_name = $validatedData['category_name'];
         $data->slug = strtolower(str_replace(' ','-', $request->category_name));
         $data->save();
         return redirect(route('admin.addcategory',['data'=>$data]))->with('msg','Category updated successfully..');
    }

}
