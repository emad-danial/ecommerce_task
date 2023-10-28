<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;

use App\Http\Requests\Order\Create;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\Order\Order;
use App\Models\Order\OrderDetail;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrdersController extends Dashboard
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $orders = Order::query();
            return datatables($orders)
                ->addColumn('view', function ($order) {
                    return $this->viewContent('span', [
                        'content' => __('admin.view') . '<i class="fa fa-eye"></i>',
                        'class' => 'btn btn-primary viewOrder',
                        'free_content' => 'data-id="' . $order->id . '"'
                    ]);
                })
                ->addColumn('delete', function ($category) {
                    return $this->viewContent('span', [
                        'content' => __('admin.delete') . '<i class="fa fa-trash"></i>',
                        'class' => 'btn btn-danger deleteItem',
                        'free_content' => 'data-id="' . $category->id . '"'
                    ]);
                })
                ->addColumn('created_at', function ($order) {
                    return $this->viewContent('span', [
                        'content' => $order->created_at
                    ]);
                })
                ->make();
        }
        return view('admin.subviews.orders.index');
    }

    public function create()
    {
        $products = Product::where('id', '>', 0)->where('is_active', '1');
        $products = $products->orderBy('id', 'DESC')->skip(0)->take(10)->get();
        $categories = Category::where('id', '>', 0)->whereNull('category_id')->get()->makeHidden('product_stock_count');
        return view('admin.subviews.orders.form', compact('categories', 'products'));
    }

    public function store(Create $request)
    {

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'total_price' => $request->get('total_price'),
            'address' => $request->get('address'),
            'status' => $request->get('new_order'),
        ]);
        if (!empty($order)) {
            foreach ($request->get('items') as  $item) {
              if(!empty($item)){
                  OrderDetail::create([
                      'order_id' => $order->id,
                      'product_id' => $item['id'],
                      'quantity' => $item['quantity'],
                      'product_price' => $item['price'],
                      'total_price' => $item['quantity']*$item['price']
                  ]);
              }
            }
        }
        $orderr=Order::where('id',$order->id)->first()->toArray();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'),$orderr);
    }

    public function activationCategory(Request $request)
    {
        $category = Order::find($request->get('category_id'));
        $category->is_active = !$category->is_active;
        $category->save();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function deleteItem(Request $request)
    {
        $category = Order::where('id', $request->get('category_id'))->delete();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function getOrdersInfo(Request $request)
    {
        $Order = Order::where('id', $request->get('categoryId'))->with('user')->with('product')->with('category')->with('subCategory')->first()->toArray();
        return $this->getJsonSuccessResponse("", $Order);
    }

    public function updateCategory(UpdateCategory $request)
    {
        $parentCategory = null;
        $image = null;
        $category = Order::find($request->get('category_id'));

        //If Category is Parent and Convert To Sub make all Sub To The new Parent
        if (is_null($category->category_id) && $request->get('category_type') == 'sub_category') {
            Order::where('category_id', $request->get('category_id'))->update([
                'category_id' => $request->get('main_category')
            ]);
            $image = uploadImage($request->image, 'category');
            $parentCategory = $request->get('main_category');
        }


        $attrsToUpdate = [
            'name_ar' => $request->get('name_ar'),
            'name_en' => $request->get('name_en'),
            'image' => $image,
            'category_id' => $parentCategory
        ];

        $category->update($attrsToUpdate);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

}
