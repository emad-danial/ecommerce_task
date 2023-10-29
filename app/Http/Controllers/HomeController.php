<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\Category;
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
    public function getAllShopProducts(Request $request)
    {
        $categories = Category::all();
        // Create an empty array to store the latest product from each category
        $latestProducts = [];
        // Iterate over the categories
        foreach ($categories as $category) {
            // Get the latest product from the current category
            $latestProduct = Product::where([['main_category','=',$category->id],['is_active','=','1']])->orWhere([['sub_category','=',$category->id],['is_active','=','1']])->latest()->first();
            // Add the latest product to the array
            $latestProducts[] = $latestProduct;
        }
        // Return the array of latest products as a JSON response
        $response = [
            'status' => 200,
            'message' => "All Products",
            'data' => $latestProducts
        ];
        return response()->json($response);
    }
    public function getCategoryChildAndHisProducts($id)
    {

        // Get all child categories of the given category
        $childCategories = Category::where('category_id',$id)->get();
        // Get all product  under the given category and its child categories

        for($i=0;$i<count($childCategories);$i++){
            // Get the latest product from the current category
            $childCategories[$i]['products'] = Product::where([['sub_category','=',$childCategories[$i]['id']],['is_active','=','1']])->get();
        }

        // Return the array of latest products as a JSON response
        $response = [
            'status' => 200,
            'message' => "All Products",
            'data' => $childCategories
        ];
        return response()->json($response);
    }
}
