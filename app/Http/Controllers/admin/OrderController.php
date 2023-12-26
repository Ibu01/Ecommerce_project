<?php

namespace App\Http\Controllers\admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class OrderController extends Controller
{
    public function index() {
        $pendingorders = Order::where('status','pending')->get();
        return view('admin.pendingorder',['pendingorders'=>$pendingorders]);
    }

    public function completedorder() {
        $completedgorders = Order::where('status','confirmed')->get();
        return view('admin.completedorder',['completedgorders'=>$completedgorders]);
    }

    public function cancelorder() {
        return view('admin.cancelorder');
    }

    public function confirm(Order $pending) {
        $pending->update(['status' => 'confirmed']);
        return redirect()->back();
    }

    public function allorders()  {
        $allorders = Order::all();
        return view('admin.allorders',['allorders'=>$allorders]);
    }
}
