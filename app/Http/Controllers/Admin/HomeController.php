<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;
use App\Models\Order\Order;
use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Akaunting\Apexcharts\Chart;
use Illuminate\Support\Facades\Auth;

class HomeController extends Dashboard
{
    public function __construct()
    {
//        $this->middleware('auth')->except('login');
    }
    public function index(Request $request)
    {
        if(!Auth::user()){
            return redirect(route('admin.login'));
        }
        $categoriesCount=Category::all()->count();
        $usersCount=User::where('type','user')->get()->count();
        $productsCount=Product::all()->count();
        $ordersCount=Order::all()->count();
        return view('admin.subviews.home.index',compact('categoriesCount','usersCount','productsCount','ordersCount'));
    }
    public function login()
    {
        return view('admin.subviews.auth.login');
    }
    public function signOut()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
    public function loginPost(Request $request){

        $request->validate([
            'email'    => 'required|exists:users,email',
            'password' => 'required|min:6',
        ],[
            'email.exists' => 'The Email Not Exist',
            'password.min' => 'The password must be at least :min charts',
        ]);
        $credentials = $request->only('email', 'password');

        if(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            return redirect()->to('adminPanel/')->with('message', 'Signed in Successful');
        }

        return redirect()->back()->withErrors('Login details are not valid');
    }
}
