<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\SubCategoryModel;
use App\Models\ProductColorModel;
use Str;
use Auth;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ProductModel::getRecord();
        $data['header_title'] = 'Product';
        return view('admin.product.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Product';
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)
    {
        $title = trim($request->title);
        $product = new ProductModel;
        $product->title = $title;
        $product->created_by = Auth::user()->id;
        $product->save();

        $slug = Str::slug($request->title, "-");

        $checkSlug = ProductModel::checkSlug($slug);
        if(empty($checkSlug))
        {
            $product->slug = $slug;
            $product->save();
        }
        else
        {
           $new_slug = $slug.'-'.$product->id;
           $product->slug = $new_slug;
           $product->save();
        }

        return redirect('admin/product/edit/'.$product->id);
    }

    public function edit($product_id)
    {
        $product = ProductModel::getSingle($product_id);
        if(!empty($product))
        {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getBrand'] = BrandModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $product;
            $category_id = $product->category_id;
            $data['getSubCategory'] = SubCategoryModel::getRecordSubCategory($product->$category_id);

            $data['header_title'] = 'Edit Product';
        return view('admin.product.edit', $data);

        }
    }

    public function update($product_id, Request $request)
   {
    $product = ProductModel::getSingle($product_id);
    if(!empty($product))
    {
        $product->title = trim($request->title);
        $product->sku = trim($request->sku);
        $product->category_id = trim($request->category_id);
        $product->sub_category_id = trim($request->sub_category_id);
        $product->brand_id = trim($request->brand_id);
        $product->retail_price = trim($request->retail_price);
        $product->bulk_price = trim($request->bulk_price);
        $product->box_price = trim($request->box_price);
        $product->short_description = trim($request->short_description);
        $product->description = trim($request->description);
        $product->additional_info = trim($request->additional_info);
        $product->shipping_returns = trim($request->shipping_returns);
        $product->status = trim($request->status);
        $product->save();

        ProductColorModel::DeleteRecord($product->id);
        
        return redirect()->back()->with('success', "Product successfully updated");
    }
    else
    {
        abort(404);
    }
   }
}
