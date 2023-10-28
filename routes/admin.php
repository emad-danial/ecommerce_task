<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [HomeController::class, 'login'])->name('admin.login');
Route::get('/signout', [HomeController::class, 'signout'])->name('admin.signout');
Route::post('/loginPost', [HomeController::class, 'loginPost'])->name('admin.loginPost');


Route::name('admin.')->middleware(['isAdmin'])->group(function () {

    Route::get('/', [HomeController::class, 'index']);

    Route::name('admins.')->controller(AdminsController::class)->group(function () {
        Route::get('/admins', 'index')->middleware('hasPermission:listening-admins')->name('index');
        Route::post('/admins/createAdmin', 'createAdmin')->middleware('hasPermission:create-admin')->name('create');
        Route::post('/admins/updateAdmin', 'updateAdmin')->middleware('hasPermission:update-admin')->name('update');
        Route::post('/admins/activation', 'activationAdmin')->middleware('hasPermission:update-admin')->name('activation');
        Route::post('/admins/getAdminInfo', 'getAdminInfo')->middleware('hasPermission:listening-admins')->name('getAdminInfo');
    });

    Route::name('roles.')->controller(UsersController::class)->group(function () {
        Route::get('/roles', 'index')->middleware('hasPermission:listening-users')->name('index');
    });

    Route::name('users.')->controller(UsersController::class)->group(function () {
        Route::get('/users', 'index')->middleware('hasPermission:listening-users')->name('index');
        Route::post('/users/createUser', 'createUser')->middleware('hasPermission:create-user')->name('create');
        Route::post('/users/updateUser', 'updateUser')->middleware('hasPermission:update-user')->name('update');
        Route::post('/users/activation', 'activationUser')->middleware('hasPermission:update-user')->name('activation');
        Route::post('/users/getUserInfo', 'getUserInfo')->middleware('hasPermission:listening-users')->name('getUserInfo');
    });


    Route::name('categories.')->controller(CategoriesController::class)->group(function () {
        Route::get('/categories', 'index')->middleware('hasPermission:listening-categories')->name('index');
        Route::post('/categories/createCategory', 'createCategory')->middleware('hasPermission:create-category')->name('create');
        Route::post('/categories/updateCategory', 'updateCategory')->middleware('hasPermission:update-category')->name('update');
        Route::post('/categories/activation', 'activationCategory')->middleware('hasPermission:update-category')->name('activation');
        Route::post('/categories/deleteItem', 'deleteItem')->middleware('hasPermission:update-category')->name('deleteItem');
        Route::post('/categories/getCategoryInfo', 'getCategoryInfo')->middleware('hasPermission:listening-categories')->name('getCategoryInfo');
    });


    Route::name('orders.')->controller(OrdersController::class)->group(function () {
        Route::get('/orders', 'index')->middleware('hasPermission:listening-categories')->name('index');
        Route::get('/orders/create', 'create')->middleware('hasPermission:listening-categories')->name('orders.create');
        Route::post('/orders/getOrdersInfo', 'getOrdersInfo')->middleware('hasPermission:listening-categories')->name('getOrdersInfo');
        Route::post('/orders/store', 'store')->middleware('hasPermission:listening-categories')->name('store');
        Route::post('/orders/deleteItem', 'deleteItem')->middleware('hasPermission:listening-categories')->name('deleteItem');
    });


    Route::name('products.')->controller(ProductsController::class)->group(function () {
        Route::get('/products', 'index')->middleware('hasPermission:listening-products')->name('index');
        Route::post('/products/create', 'createProduct')->middleware('hasPermission:create-product')->name('create');
        Route::post('/products/update', 'updateProduct')->middleware('hasPermission:update-product')->name('update');
        Route::post('/products/activation', 'activationProduct')->middleware('hasPermission:update-product')->name('activation');
        Route::post('/products/active_all', 'active_all')->middleware('hasPermission:update-product')->name('active_all');
        Route::post('/products/getAllSubCategories', 'getAllSubCategories')->middleware('hasPermission:update-product')->name('getAllSubCategories');
        Route::post('/products/deleteItem', 'deleteItem')->middleware('hasPermission:update-product')->name('deleteItem');
        Route::post('/products/getProductInfo', 'getProductInfo')->middleware('hasPermission:listening-products')->name('getProductInfo');
    });


    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');


});
