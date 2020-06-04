<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
use App\Product;

class CategoryController extends Controller
{
    //
    function getListCategory()
    {
        $categories = Category::all();
        return view('admin.category.list_category', compact('categories'));
    }

    function getAddCategory()
    {
        $list_root_category = Category::whereNull('parent')->get();
        $list_sub_category = DB::table('categories')->where('parent', '!=', null)->get();
        return view('admin.category.add_category', compact('list_root_category', 'list_sub_category'));
    }

    function getEditCategory($id)
    {
        $category = Category::find($id);
        $list_root_category = DB::table('categories')->where('parent', '=', null)->get();
        return view('admin.category.edit_category', compact('category', 'list_root_category'));
    }

    function getDeleteCategory($id, Request $request)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect(route('list-danh-muc'));
    }

    function postAddCategory(CategoryRequest $request)
    {
        $file['name'] = [];
        if ($request->hasFile('image_category')) {
            $file = upload_image('image_category');
            if (isset($file['name'])) {
                $file['name'];
            }
        }
        Category::create([
            'category_name' => $request->input('category_name'),
            'description' => $request->input('description'),
            'ordering' => $request->input('ordering'),
            'image' => $file['name']
        ]);

        return redirect(route('list-danh-muc'))->with('success', 'Thêm thành danh mục thành công !!!');
    }

    function postEditCategory($id, CategoryRequest $request)
    {
        $file['name'] = [];
        if ($request->hasFile('image_category')) {
            $file = upload_image('image_category');
            if (isset($file['name'])) {
                $file['name'];
            }
        }

        $category = Category::find($id);
        $category->update([
            'category_name' => $request->input('category_name'),
            'description' => $request->input('description'),
            'ordering' => $request->input('ordering'),
            'image' => $file['name'] ? $file['name'] : $category->image,
        ]);
        return redirect(route('list-danh-muc'))->with('success', 'Sửa thành danh mục thành công !!!');
    }
}
