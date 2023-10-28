<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;
use App\Http\Requests\Product\Create;
use App\Http\Requests\Product\Update;
use App\Models\Product\Product;
use App\Models\Product\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Dashboard
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $products = Product::query();
            return datatables($products)
                ->addColumn('name_ar', function ($product) {
                    return $this->viewContent('span', [
                        'content' => $product->name_ar
                    ]);
                })
                ->addColumn('name_en', function ($product) {
                    return $this->viewContent('span', [
                        'content' => $product->name_en
                    ]);
                })
                ->addColumn('main_category', function ($product) {
                    if($product->main_category > 0)
                    return $this->viewContent('span', [
                        'content' =>  Category::where('id',$product->main_category)->first()['name_ar']
                    ]);
                    return '';
                })->addColumn('sub_category', function ($product) {
                    if($product->sub_category > 0)
                    return $this->viewContent('span', [
                        'content' =>  Category::where('id',$product->sub_category)->first()['name_ar']
                    ]);
                    return '';
                })
                ->addColumn('image', function ($product) {
                    return $this->viewContent('img', [
                        'src'    => $product->image,
                        'width'  => '50px',
                        'height' => '50px'
                    ]);
                })
                ->addColumn('is_active', function ($product) {
                    return $this->viewContent('span', [
                        'content'      => $product->is_active ? __('admin.is_active') : __('admin.dis_active'),
                        'class'        => $product->is_active ? 'btn btn-primary activation' : 'btn btn-danger activation',
                        'free_content' => 'data-id="' . $product->id . '"'
                    ]);
                })
                ->addColumn('update', function ($product) {
                    return $this->viewContent('span', [
                        'content'      => __('admin.update') . '<i class="fa fa-user-edit"></i>',
                        'class'        => 'btn btn-primary editProduct',
                        'free_content' => 'data-id="' . $product->id . '"'
                    ]);
                })->addColumn('select', function ($product) {
                    return $this->viewContent('span', [
                        'content'   => '<input type="checkbox" value="'.$product->id.'" class="checkbox" > ',
                    ]);
                })
                ->addColumn('delete', function ($category) {
                    return $this->viewContent('span', [
                        'content'      => __('admin.delete') . '<i class="fa fa-trash"></i>',
                        'class'        => 'btn btn-danger deleteItem',
                        'free_content' => 'data-id="' . $category->id . '"'
                    ]);
                })
                ->addColumn('created_at', function ($product) {
                    return $this->viewContent('span', [
                        'content' => $product->created_at
                    ]);
                })
                ->make();
        }
        return view('admin.subviews.products.index');
    }

    public function createProduct(Create $request)
    {

        Product::create([
            'name_ar'     => $request->get('name_ar'),
            'name_en'     => $request->get('name_en'),
            'sub_category'     => $request->get('sub_category') > 0 ?$request->get('sub_category'):null,
            'main_category'     => $request->get('main_category') > 0 ?$request->get('main_category'):null,
            'description_ar'     => $request->get('description_ar'),
            'description_en'     => $request->get('description_en'),
            'price'     => $request->get('price'),
            'image'       => !is_null($request->file('image')) ? uploadImage($request->image, 'service') : null
        ]);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function activationProduct(Request $request)
    {
        $product            = Product::find($request->get('product_id'));
        $product->is_active = !$product->is_active;
        $product->save();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }
    public function active_all(Request $request)
    {
       $IDS= explode( ',', $request->ids );
       if(count($IDS)>0){
           for ($i=0;$i<count($IDS);$i++){
               $product            = Product::find($IDS[$i]);
               $product->is_active = !$product->is_active;
               $product->save();
           }
       }
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }
    public function getAllSubCategories(Request $request)
    {
        $categories = Category::where('category_id', $request->get('main_category_id'))->select([
            'id',
            'name_ar',
            'name_en',
            'image',
        ])->get()->toArray();
        return $this->getJsonSuccessResponse("", $categories);
    }
    public function deleteItem(Request $request)
    {
        $category            = Product::where('id',$request->get('category_id'))->delete();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }


    public function getProductInfo(Request $request)
    {
        $Product = Product::where('id', $request->get('serviceID'))->select([
            'name_ar',
            'name_en',
            'description_ar',
            'description_en',
            'price',
            'image',
        ])->first()->toArray();
        return $this->getJsonSuccessResponse("", $Product);
    }

    public function updateProduct(Update $request)
    {
        $parentCategory = null;
        $image          = null;
        $product       = Product::find($request->get('product_id'));

        //If Category is Parent and Convert To Sub make all Sub To The new Parent

        if ($request->hasFile('image')) {
            $image          = uploadImage($request->image,'service');
        }

        $attrsToUpdate = [
            'name_ar'     => $request->get('name_ar'),
            'name_en'     => $request->get('name_en'),
            'description_ar'     => $request->get('description_ar'),
            'description_en'     => $request->get('description_en'),
            'price'     => $request->get('price'),
            'sub_category'     => $request->get('sub_category') > 0 ?$request->get('sub_category'):null,
            'main_category'     => $request->get('main_category') > 0 ?$request->get('main_category'):null,
        ];
        if($image != null){
            $attrsToUpdate = [
                'name_ar'     => $request->get('name_ar'),
                'name_en'     => $request->get('name_en'),
                'description_ar'     => $request->get('description_ar'),
                'description_en'     => $request->get('description_en'),
                'price'     => $request->get('price'),
                'sub_category'     => $request->get('sub_category') > 0 ?$request->get('sub_category'):null,
                'main_category'     => $request->get('main_category') > 0 ?$request->get('main_category'):null,
                'image'       => $image,

            ];
        }

        $product->update($attrsToUpdate);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

}
