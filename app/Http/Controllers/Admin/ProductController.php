<?php

namespace App\Http\Controllers\Admin;

use App\Galleries;
use App\Http\Requests\ProductRequest;
use App\ImageProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function getListProduct()
    {
        $products = Product::with('category')->latest('updated_at')->paginate(10);

        return view('admin.product.list_product', compact('products'));
    }

    function getAddProduct()
    {
        $categories = Category::all();
        return view('admin.product.add_new_item', compact('categories'));
    }

    function getEditProduct($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        $parent_categories = Category::query()->where('parent', '=', null)->get();
        $subcategories = Category::query()->where('parent', '!=', null)->get();
        return view('admin.product.edit_item', compact('product', 'parent_categories', 'subcategories', 'categories'));
    }

    function getEditListImageProduct($id, Request $request)
    {
        $product = Product::find($id);
        $list_image = Galleries::query()->where('product_id', '=', $id)->get();
        return view('admin.product.list_image_product', compact('product', 'list_image'));
    }

    function getAddImageProduct($product_id, Request $request)
    {
        $product = Product::find($product_id);
        return view('admin.product.edit_image_product', compact('product'));
    }

    function getDeleteProduct($product_id, Request $request)
    {
        $product = Product::find($product_id);
        $product->delete();
        return redirect(route('danh-sach-san-pham'));
    }

    function getDeleteGallery($id, Request $request)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect(route('danh-sach-san-pham'));
    }

    function postAddProduct(ProductRequest $request)
    {
        $file['name'] = [];
        if ($request->hasFile('product_image_intro')) {
            $file = upload_image('product_image_intro');
            if (isset($file['name'])) {
                $file['name'];
            }
        }
        Product::create([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'publish' => $request->input('publish'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'brand' => $request->input('brand'),
            'address' => $request->input('address'),
            'ordering' => $request->input('ordering'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'full_description' => $request->input('full_description'),
            'product_image_intro' => $file['name']

        ]);
        return redirect(route('danh-sach-san-pham'))->with('success', 'Thêm sản phẩm thành công !!!');
    }

    function postAddImageProduct($product_id, Request $request)
    {
        $request->validate([
            'image' => 'required',

        ]);
        $productModel = Product::find($product_id);
        $d = Galleries::all();
        $modelGalleries = new Galleries();
        if ($request->hasFile('image') && $request->hasFile('image1')) {
            if ($request->file('image')->isValid() && $request->file('image')->isValid()) {
                try {
                    $modelGalleries->product_id = $productModel->id;
                    $file = $request->file('image');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $modelGalleries->image = $request->file('image')->move("upload/products", $name);
                    $file1 = $request->file('image1');
                    $name1 = rand(11111, 99999) . '.' . $file1->getClientOriginalExtension();
                    $modelGalleries->image1 = $request->file('image1')->move("upload/products", $name1);
                    $modelGalleries->save();
                    return redirect(route('list-image', ['product_id' => $product_id, 'modelGalleries' => $modelGalleries]));
                } catch (\Exception $e) {
                }
            }
        }


    }

    function postEditProduct($id, ProductRequest $request)
    {
        $file['name'] = [];
        if ($request->hasFile('product_image_intro')) {
            $file = upload_image('product_image_intro');
            if (isset($file['name'])) {
                $file['name'];
            }
        }

        $productModel = Product::find($id);
        $productModel->update([
            'product_name' => $request->input('product_name'),
            'category_id' => $request->input('category_id'),
            'publish' => $request->input('publish'),
            'price' => $request->input('price'),
            'sale' => $request->input('sale'),
            'brand' => $request->input('brand'),
            'address' => $request->input('address'),
            'ordering' => $request->input('ordering'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'full_description' => $request->input('full_description'),
            'product_image_intro' => $file['name'] ? $file['name'] : $productModel->product_image_intro,
        ]);
        return redirect(route('danh-sach-san-pham'))->with('success', 'Sửa thành sản phẩm thành công !!!');;
    }
}
