<?php

namespace App\Http\Controllers\Admin;

use App\Galleries;
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
        $products = Product::orderBy('id', 'DESC')->paginate(5);

        return view('admin.product.list_product', compact('products'));
    }

    function getAddProduct()
    {
        return view('admin.product.add_new_item');
    }

    function getEditProduct($id)
    {
        $product = Product::find($id);
        $parent_categories = Category::query()->where('parent', '=', null)->get();
        $subcategories = Category::query()->where('parent', '!=', null)->get();
        return view('admin.product.edit_item', compact('product', 'parent_categories', 'subcategories'));
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

    function postAddProduct(Request $request)
    {
        $post = $request->all();
        $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            'quantity' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $productModel = new Product();
        $productModel->product_name = $post['product_name'];
        $productModel->category_id = $post['category_id'];
        $productModel->publish = $post['publish'];
        $productModel->price = $post['price'];
        $productModel->sale = $post['sale'];
        $productModel->ordering = $post['ordering'];
        $productModel->quantity = $post['quantity'];
        $productModel->description = $post['description'];
        $productModel->full_description = $post['full_description'];
        $productModel->created_at = date('Y-m-d H:i:s');
        $productModel->updated_at = date('Y-m-d H:i:s');
        if ($productModel->save()) {
            if ($request->hasFile('product_image_intro')) {
                $file = $request->product_image_intro;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name = $file->getClientOriginalName();
                $extension_file = $file->getClientOriginalExtension();
                $temp_file = $file->getRealPath();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $random = random_int(10000, 50000);
                $file->move('upload/products', $random . $file->getClientOriginalName());
                $productModel->product_image_intro = "upload/products/" . $random . $file->getClientOriginalName();
                $productModel->save();
            }
        }
        return redirect(route('danh-sach-san-pham'));
    }
    function postAddImageProduct($product_id, Request $request)
    {
        $post = $request->all();
        $request->validate([
            'image' => 'required',

        ]);
        $productModel = Product::find($product_id);
        $d=Galleries::all();
        $modelGalleries = new Galleries();
        if ($request->hasFile('image') && $request->hasFile('image1')) {
            if($request->file('image')->isValid()&&$request->file('image')->isValid()) {
                try {
                    $modelGalleries->product_id=$productModel->id;
                    $file = $request->file('image');
                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
                    $modelGalleries->image= $request->file('image')->move("upload/products", $name);
                    $file1 = $request->file('image1');
                    $name1 = rand(11111, 99999) . '.' . $file1->getClientOriginalExtension();
                    $modelGalleries->image1= $request->file('image1')->move("upload/products", $name1);
                    $modelGalleries->save();
                    return redirect(route('list-image',['product_id'=>$product_id,'modelGalleries'=>$modelGalleries]));
                } catch (\Exception $e) {
                }
            }
        }


    }


//    function postAddImageProduct($product_id, Request $request)
//    {
//        foreach ($request->image as $key => $item) {
//            $file['name'] = [];
//            for ($i = 0; $i <= $key; $i++) {
//                if ($request->hasFile('image')) {
//                    $file = upload_image($item);
//                    dd($file);
//                }
//            }
//            dd($file);
////            if ($request->hasFile('image')) {
//////                dd('image');
////                $file[$key] = upload_image('image');
////            }
//            dd($file['name']);
//            ImageProduct::create([
//                'product_id' => $product_id,
//                'image' => $file['name']
//            ]);
//        }
////        $file['name'] = '';
//////        dd($request->hasFile('image')); // trả ve true or false
////        if ($request->hasFile('image')) {
//////            dd(upload_image('image') );
////                        //            "name" => "2020-05-15__11025lay-hoa-che-mat.jpg"
////                                     //  "code" => 1
////                                    //  "path_img" => "uploads/2020-05-15__11025lay-hoa-che-mat.jpg"
////            $file = upload_image('image');
////        }
////        ImageProduct::create([
////            'product_id' => $product_id,
////            'image' => $file['name']
////        ]);
//        return redirect()->back();
////        try {
////            DB::beginTransaction();
////            foreach ($request->image as $item) {
////                dd($item);
////                $file['name'] = '';
//////                if ($request->hasFile($item)) {
//////                    dd(1);
//////                    $file = upload_image($item);
////                    if (isset($file['name'])) {
////                        ImageProduct::create([
////                            'product_id' => $product_id,
////                            'image' => $file['name'],
////                        ]);
//////                    }
////                }
////            }
////            DB::commit();
////            return redirect()->back();
////        } catch (\Exception $e) {
////            DB::rollBack();
////            return redirect()->back()->with('error', $e->getMessage());
////        }
////        $file['name'] = '';
////        if ($request->hasFile('image')) {
////            $file = upload_image('image');
////            if (isset($file['name'])) {
////                ImageProduct::create([
////                    'product_id' => $product_id,
////                    'image' => $file['name'],
////
////                ]);
////            }
////        }
////        $post = $request->all();
////        $request->validate([
////            'image' => 'required',
////
////        ]);
////        $productModel = Product::find($product_id);
////        $d = Galleries::all();
////        $modelGalleries = new Galleries();
////        if ($request->hasFile('image') && $request->hasFile('image1')) {
////            if ($request->file('image')->isValid() && $request->file('image')->isValid()) {
////                try {
////                    $modelGalleries->product_id = $productModel->id;
////                    $file = $request->file('image');
////                    $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
////                    $modelGalleries->image = $request->file('image')->move("upload/products", $name);
////                    $file1 = $request->file('image1');
////                    $name1 = rand(11111, 99999) . '.' . $file1->getClientOriginalExtension();
////                    $modelGalleries->image1 = $request->file('image1')->move("upload/products", $name1);
////                    $modelGalleries->save();
////                    return redirect(route('list-image', ['product_id' => $product_id, 'modelGalleries' => $modelGalleries]));
////                } catch (\Exception $e) {
////
////                }
////            }
////        }
//
//
//    }

    function postEditProduct($id, Request $request)
    {
        $post = $request->all();
        $request->validate([
            'product_name' => 'required|unique:products,id|max:255',
            'category_id' => 'required',
            'price' => 'required',
            'ordering' => 'required',
            'quantity' => 'required',
            //TODO lat nua phai lam upload product
            //'product_image_intro' => 'required',
            'description' => 'required',
            'full_description' => 'required'
        ]);
        $productModel = Product::find($id);
        $productModel->product_name = $post['product_name'];
        $productModel->category_id = $post['category_id'];
        $productModel->publish = $post['publish'];
        $productModel->price = $post['price'];
        $productModel->sale = $post['sale'];
        $productModel->ordering = $post['ordering'];
        $productModel->quantity = $post['quantity'];
        $productModel->description = $post['description'];
        $productModel->full_description = $post['full_description'];
        $productModel->created_at = date('Y-m-d H:i:s');
        $productModel->updated_at = date('Y-m-d H:i:s');
        if ($productModel->save()) {
            if ($request->hasFile('product_image_intro')) {
                $file = $request->product_image_intro;
                // nếu cần validate file upload lên thì sử dụng mấy biến này
                $file_name = $file->getClientOriginalName();
                $extension_file = $file->getClientOriginalExtension();
                $temp_file = $file->getRealPath();
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $random = random_int(10000, 50000);
                $file->move('upload/products', $random . $file->getClientOriginalName());
                $productModel->product_image_intro = "upload/products/" . $random . $file->getClientOriginalName();
                $productModel->save();
            }
        }
        return redirect(route('danh-sach-san-pham'));
    }
}
