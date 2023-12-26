<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\SubCategoryController;



Route::controller(HomeController::class)->group(function(){
   Route::get('/','index')->name('home.index');
});

Route::controller(ClientController::class)->group(function(){
   Route::get('/category/{category}/{slug}','category')->name('client.category');
   Route::get('/newrelease','newrelease')->name('client.newrelease');
   Route::get('/customerservices','customerservices')->name('client.customerservices');
   Route::get('/subcategory/{subcategory}/{slug}','subcategory')->name('client.subcategory');
   Route::get('singleproduct/{product}','singleproduct')->name('client.singleproduct');
});

Route::middleware(['auth', 'role:user'])->group(function () {
   Route::controller(ClientController::class)->group(function(){
   Route::get('/todaysdeals','todaysdeals')->name('client.todaysdeals');
   Route::get('/userprofile','userprofile')->name('client.userprofile');
   Route::get('/orderprofile','orderprofile')->name('client.orderprofile');
   Route::get('/pendingorder','pendingorder')->name('client.pendingorder');
   Route::get('/orderhistory','orderhistory')->name('client.orderhistory');
   Route::post('/addtocart/{product}','addtocart')->name('client.addtocart');
   Route::get('/displayproduct','displayproduct')->name('client.displayproduct');
   Route::get('/shippinginfo','shippinginfo')->name('client.shippinginfo');
   Route::post('/storeshippingaddress','storeshippingaddress')->name('client.storeshippingaddress');
   Route::get('/checkout','checkout')->name('client.checkout');
   Route::post('/placeorder','placeorder')->name('client.placeorder');
   Route::delete('/deletecartitems/{cart}','deletecartitems')->name('client.deletecartitems');
});
});

Route::get('/dashboard/profile', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','role:admin'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->group(function () {
   Route::controller(DashboardController::class)->group(function () {
   Route::get('/admin/dashboard','index')->name('admin.dashboard');
});


 Route::controller(CategoryController::class)->group(function () {
   Route::get('/admin/allcategory','index')->name('admin.allcategory');
   Route::get('/admin/addcategory','addcategory')->name('admin.addcategory');
   Route::post('/admin/storecategory','storecategory')->name('admin.storecategory');
   Route::delete('/admin/delete/{data}','deleteallcategory')->name('admin.deleteallcategory');
   Route::get('/admin/edit/{data}','categoryedit')->name('admin.categoryedit');
   Route::put('/admin/categoryupdate/{data}','categoryupdate')->name('admin.categoryupdate');
});


 Route::controller(SubCategoryController::class)->group(function () {
   Route::get('/admin/allsubcategory','index')->name('admin.allsubcategory');
   Route::get('/admin/addsubcategory','addsubcategory')->name('admin.addsubcategory');
   Route::post('/admin/storesubcategory','storesubcategory')->name('admin.storesubcategory');
   Route::delete('/admin/deletesubcategory/{data}','deletesubcategory')->name('admin.deletesubcategory');
   Route::get('admin/editsubcategory/{data}','editsubcategory')->name('admin.editsubcategory');
   Route::put('/admin/updatesubcategory/{data}','updatesubcategory')->name('admin.updatesubcategory');
});


 Route::controller(ProductController::class)->group(function () {
   Route::get('/admin/allproduct','index')->name('admin.allproduct');
   Route::get('/admin/addproduct','addproduct')->name('admin.addproduct');
   Route::post('/admin/storeproduct','storeproduct')->name('admin.storeproduct');
   Route::get('/admin/editproductimg/{data}','editproductimg')->name('admin.editproductimg');
   Route::put('/admin/updateproductimg/{data}','updateproductimg')->name('admin.updateproductimg');
   Route::delete('admin/deleteproduct/{data}','deleteproduct')->name('admin.deleteproduct');
   Route::get('/admin/editproduct/{data}','editproduct')->name('admin.editproduct');
   Route::put('/admin/updateproduct/{data}','updateproduct')->name('admin.updateproduct');
});


 Route::controller(OrderController::class)->group(function () {
   Route::get('/admin/pendingorder','index')->name('admin.pendingorder');
   Route::get('/admin/completedorder','completedorder')->name('admin.completedorder');
   Route::get('/admin/cancelorder','cancelorder')->name('admin.cancelorder');
   Route::put('/confirm/{pending}','confirm')->name('admin.confirm');
   Route::get('/allorders','allorders')->name('admin.allorders');
});


});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
