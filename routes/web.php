<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as ProductFront;



Route::get('admin', [AuthController::class, 'login_admin']);
Route::post('admin', [AuthController::class, 'auth_login_admin']);
Route::get('admin/logout', [AuthController::class, 'logout_admin']);


Route::group(['middleware' => '\App\Http\Middleware\AdminMiddleware'], function (){


Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);


Route::get('admin/admin/list', [AdminController::class, 'list']);
Route::get('admin/admin/add', [AdminController::class, 'add']);
Route::post('admin/admin/add', [AdminController::class, 'insert']);
Route::get('admin/admin/edit/{id}', [AdminController::class, 'edit']);
Route::post('admin/admin/edit/{id}', [AdminController::class, 'update']);
Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);


Route::get('admin/category/list', [CategoryController::class, 'list']);
Route::get('admin/category/add', [CategoryController::class, 'add']);
Route::post('admin/category/add', [CategoryController::class, 'insert']);
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('admin/category/edit/{id}', [CategoryController::class, 'update']);
Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);

Route::get('admin/sub_category/list', [SubCategoryController::class, 'list']);
Route::get('admin/sub_category/add', [SubCategoryController::class, 'add']);
Route::post('admin/sub_category/add', [SubCategoryController::class, 'insert']);
Route::get('admin/sub_category/edit/{id}', [SubCategoryController::class, 'edit']);
Route::post('admin/sub_category/edit/{id}', [SubCategoryController::class, 'update']);
Route::get('admin/sub_category/delete/{id}', [SubCategoryController::class, 'delete']);

Route::post('admin/get_sub_category', [SubCategoryController::class, 'get_sub_category']);


Route::get('admin/brand/list', [BrandController::class, 'list']);
Route::get('admin/brand/add', [BrandController::class, 'add']);
Route::post('admin/brand/add', [BrandController::class, 'insert']);
Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('admin/brand/edit/{id}', [BrandController::class, 'update']);
Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);

Route::get('admin/color/list', [ColorController::class, 'list']);
Route::get('admin/color/add', [ColorController::class, 'add']);
Route::post('admin/color/add', [ColorController::class, 'insert']);
Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
Route::post('admin/color/edit/{id}', [ColorController::class, 'update']);
Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);



Route::get('admin/product/list', [ProductController::class, 'list']);
Route::get('admin/product/add', [ProductController::class, 'add']);
Route::post('admin/product/add', [ProductController::class, 'insert']);
Route::get('admin/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('admin/product/edit/{id}', [ProductController::class, 'update']);

Route::get('admin/product/image_delete/{id}', [ProductController::class, 'image_delete']);
Route::post('admin/product_image_sortable', [ProductController::class, 'product_image_sortable']);


});


Route::get('/', [HomeController::class, 'home']);
Route::get('search', [ProductFront::class, 'getProductSearch']);
Route::post('get_filter_product_ajax', [ProductFront::class, 'getFilterProductAjax']);
Route::get('{category?}/{subcategory?}', [ProductFront::class, 'getCategory']);

