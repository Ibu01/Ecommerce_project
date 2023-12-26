<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function index() {
        $data = Subcategory::latest()->get();
        return view('admin.allsubcategory',['data'=>$data]);
    }

    public function addsubcategory() {
        $data = Category::latest()->get();
        return view('admin.addsubcategory',['data'=>$data]);
    }

    public function storesubcategory(Request $request) {
        $request->validate([
            'subcategory_name' => 'required',
            'category_id'=>'required',
        ]);

        $category_id = $request->category_id;
        $category_name = Category::where('id',$category_id)->value('category_name');
        Subcategory::insert([
            'subcategory_name' => $request->subcategory_name ,
            'category_id'=> $request->category_id,
            'slug' => strtolower(str_replace(' ','-', $request->subcategory_name)),
            'category_id'=>$category_id,
            'category_name'=>$category_name,
        ]);

        Category::where('id',$category_id)->increment('subcategory_count',1);
        return redirect(route('admin.allsubcategory'))->with('msg','SubCategory added successfully...');
    }

    public function deletesubcategory(Subcategory $data)  {
        $data->delete();
        $categoryId = $data->category_id;
        Category::where('id',$categoryId)->decrement('subcategory_count',1);
        return redirect()->back()->with('msg','Sub Category deleted successfully...');
    }

    public function editsubcategory(Subcategory $data) {
        return view('admin.editsubcategory',['data'=>$data]);
    }

    public function updatesubcategory(Request $request,Subcategory $data) {
         $request->validate([
            'subcategory_name' => 'required',
        ]);
        $data->update([
            'subcategory_name' => $request->subcategory_name ,
            'slug' => strtolower(str_replace(' ','-', $request->subcategory_name)),
        ]);
        return redirect(route('admin.allsubcategory'))->with('msg','SubCategory updated successfully...');
    }
}
