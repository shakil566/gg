<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin == '1') {
            return redirect('dashboard/admin');
        } else {
            return view('frontend.index');
            // return view('welcome');
        }
    }


    public function admin()
    {
        $brandCount = Brand::where('status','1')->count();
        $productCategoryCount = ProductCategory::where('status','1')->count();
        return view('admin.dashboard', compact('brandCount', 'productCategoryCount'));
    }
}
