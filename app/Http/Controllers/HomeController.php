<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }
    public function getAllproducts(Request $request)
    {

        $products = Product::where('id','>', 0)->where('is_active','1');
        $products = $products->orderBy('id','DESC')->skip(0)->take(10)->get();
        if (isset($request['category_id']) && $request['category_id'] != '') {
            $products->where('main_category', $request['category_id']);
        }

        $response = [
            'status' => 200,
            'message' => "All Products",
            'data' => $products
        ];
        return response()->json($response);
    }
}
