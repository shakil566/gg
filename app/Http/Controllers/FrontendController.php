<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.about-us');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function shoppingCart()
    {
        return view('frontend.shopping-cart');
    }
    public function checkout()
    {
        return view('frontend.checkout');
    }
    public function singleProduct()
    {
        return view('frontend.single-product');
    }
    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function shopLeftSidebar()
    {
        return view('frontend.shop-left-sidebar');
    }
    public function blogDetails()
    {
        return view('frontend.blog-details-left-sidebar');
    }
}
