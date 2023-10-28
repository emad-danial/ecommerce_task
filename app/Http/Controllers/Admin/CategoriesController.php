<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Dashboard;
use App\Http\Requests\Category\CreateCategory;
use App\Http\Requests\Category\UpdateCategory;
use App\Models\Product\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Dashboard
{
    public function index(Request $request)
    {
        if (\request()->ajax()) {
            $categories = Category::query();
            return datatables($categories)
                ->addColumn('name_ar', function ($category) {
                    return $this->viewContent('span', [
                        'content' => $category->name_ar
                    ]);
                })
                ->addColumn('name_en', function ($category) {
                    return $this->viewContent('span', [
                        'content' => $category->name_en
                    ]);
                })
                ->addColumn('image', function ($category) {
                    return $this->viewContent('img', [
                        'src'    => $category->image,
                        'width'  => '50px',
                        'height' => '50px'
                    ]);
                })
                ->addColumn('category_type', function ($category) {
                    return $this->viewContent('span', [
                        'content' => is_null($category->category_id) ? 'رئيسي' : 'فرعي'
                    ]);
                })
                ->addColumn('parent_category', function ($category) {
                    return $this->viewContent('span', [
                        'content' => !is_null($category->category_id) ? $category->parentCategory->name_ar : ''
                    ]);
                })
                ->addColumn('is_active', function ($category) {
                    return $this->viewContent('span', [
                        'content'      => $category->is_active ? __('admin.is_active') : __('admin.dis_active'),
                        'class'        => $category->is_active ? 'btn btn-primary activation' : 'btn btn-danger activation',
                        'free_content' => 'data-id="' . $category->id . '"'
                    ]);
                })
                ->addColumn('update', function ($category) {
                    return $this->viewContent('span', [
                        'content'      => __('admin.update') . '<i class="fa fa-user-edit"></i>',
                        'class'        => 'btn btn-primary editCategory',
                        'free_content' => 'data-id="' . $category->id . '"'
                    ]);
                })

                ->addColumn('delete', function ($category) {
                    return $this->viewContent('span', [
                        'content'      => __('admin.delete') . '<i class="fa fa-trash"></i>',
                        'class'        => 'btn btn-danger deleteItem',
                        'free_content' => 'data-id="' . $category->id . '"'
                    ]);
                })
                ->addColumn('created_at', function ($user) {
                    return $this->viewContent('span', [
                        'content' => $user->created_at
                    ]);
                })
                ->make();
        }
        return view('admin.subviews.categories.index');
    }

    public function createCategory(CreateCategory $request)
    {
        Category::create([
            'name_ar'     => $request->get('name_ar'),
            'name_en'     => $request->get('name_en'),
            'description_ar'     => $request->get('description_ar'),
            'description_en'     => $request->get('description_en'),
            'category_id' => $request->get('main_category'),
            'image'       => !is_null($request->file('image')) ? uploadImage($request->image, 'category') : null
        ]);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function activationCategory(Request $request)
    {
        $category            = Category::find($request->get('category_id'));
        $category->is_active = !$category->is_active;
        $category->save();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function deleteItem(Request $request)
    {
        $category            = Category::where('id',$request->get('category_id'))->delete();
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

    public function getCategoryInfo(Request $request)
    {
        $Category = Category::where('id', $request->get('categoryId'))->select([
            'name_ar',
            'name_en',
            'description_ar',
            'description_en',
            'category_id',
        ])->first()->toArray();
        return $this->getJsonSuccessResponse("", $Category);
    }

    public function updateCategory(UpdateCategory $request)
    {
        $parentCategory = null;
        $image          = null;
        $category       = Category::find($request->get('category_id'));

        //If Category is Parent and Convert To Sub make all Sub To The new Parent
        if (is_null($category->category_id) && $request->get('category_type') == 'sub_category') {
            Category::where('category_id', $request->get('category_id'))->update([
                'category_id' => $request->get('main_category')
            ]);

            $parentCategory = $request->get('main_category');
        }

        if ($request->hasFile('image')) {
            $image          = uploadImage($request->image,'category');
        }

        $attrsToUpdate = [
            'name_ar'     => $request->get('name_ar'),
            'name_en'     => $request->get('name_en'),
            'description_ar'     => $request->get('description_ar'),
            'description_en'     => $request->get('description_en'),
            'category_id' => $parentCategory
        ];
        if($image != null){
            $attrsToUpdate = [
                'name_ar'     => $request->get('name_ar'),
                'name_en'     => $request->get('name_en'),
                'description_ar'     => $request->get('description_ar'),
                'description_en'     => $request->get('description_en'),
                'image'       => $image,
                'category_id' => $parentCategory
            ];
        }

        $category->update($attrsToUpdate);
        return $this->getJsonSuccessResponse(__('admin.you_operation_is_done_successfully'));
    }

}
