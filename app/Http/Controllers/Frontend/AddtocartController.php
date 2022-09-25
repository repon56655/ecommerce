<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Frontend\Addtocart;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\Cupon;
class AddtocartController extends Controller
{
    public function addtocart($pid){
        $items = Product::find($pid);
        $add = new Addtocart;
        $add->user_id = Auth::user()->id;
        $add->product_id = $pid;
        $add->name = $items->product_name;
        $add->price = $items->product_price;
        $add->image = $items->thumbnails;
        $add->quantity = 1;
        $add->save();
        return response()->json([
            'status'=>"success"
        ]);
    }
    public function showitem(){
        $count = Addtocart::Where("user_id",Auth::user()->id)->count();
        $data = Addtocart::Where("user_id",Auth::user()->id)->get();
        
        return response()->json([
            "count"=>$count,
            "data"=>$data
        ]);
    }
     public function removeItem($id){
        $remove =Addtocart::find($id);
        $remove->delete();
        return response()->json([
            "status"=>"success"
        ]);
     }
     public function cart(){
        $data = Addtocart::Where("user_id",Auth::user()->id)->get();
        return view("frontend.pages.cart",compact("data"));
     }
     public function coupon($coupon){
        $Cupon = Cupon::Where("cupon_code",$coupon)->first();
        return response()->json([
            "data"=>$Cupon
        ]);
     }
}
