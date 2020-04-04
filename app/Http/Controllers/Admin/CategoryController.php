<?php

namespace App\Http\Controllers\Admin;

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
        $list_root_category =Category::whereNull('parent')->get();
//        $list_root_category = DB::table('categories')->where('parent', '=', null)->get();
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

    function postAddCategory(Request $request)
    {
        $post = $request->all();
        $request->validate([
            'category_name' => 'required|unique:categories|max:255',
            'ordering' => 'required',
            'description' => 'required'
        ]);
        $category = new Category();
        $category->category_name = $post['category_name'];
        $category->ordering = $post['ordering'];
        $category->description = $post['description'];
        $category->publish = 1;
        if ($category->save()) {
            if ($request->hasFile('image_category')) {
                $file = $request->image_category;
                $random = random_int(10000, 99999);
                $file->move('upload/categories', $random . $file->getClientOriginalName());
                $category->image_category = "upload/categories/" . $random . $file->getClientOriginalName();
                $category->save();
            }
        }
        return redirect(route('list-danh-muc'));
    }

    function postEditCategory($id, Request $request)
    {
        $post = $request->all();
        $request->validate([
            'category_name' => 'required|unique:categories,id|max:255',
            'ordering' => 'required',
            'description' => 'required'
        ]);
        $category = Category::find($id);
        $category->category_name = $post['category_name'];
        $category->ordering = $post['ordering'];
        $category->description = $post['description'];
        $category->parent = $post['parent'];
        $category->publish = 1;
        if ($category->save()) {
            if ($request->hasFile('image_category')) {
                $file = $request->image_category;
                $random = random_int(10000, 99999);
                $file->move('upload/categories', $random . $file->getClientOriginalName());
                $category->image_category = "upload/categories/" . $random . $file->getClientOriginalName();
                $category->save();
            }
        }
        return redirect(route('list-danh-muc'));
    }
}
