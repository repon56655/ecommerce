<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Slider;
use App\Models\Backend\Product;
class Home extends Controller
{
    public function index(){
        $categories = Category::all();
        $products = Product::Where("status", 1)->get();
        $sliders = Slider::Where("status", 1)->get();
        return view("frontend.home",compact("categories","sliders","products"));
    }
    public function frontendlogin(){
        return view("frontend.pages.register");
    }
}
