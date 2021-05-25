<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //  Danh sach danh muc
    public function getList(){
        $category = Category::all();
//        var_dump($category);
//        die();
        return view('admin.category.list', compact('category'));
    }

    //  Them danh muc
    public function getAdd(){
        return view('admin.category.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
        [
            'name' =>  'required|unique:Category,name|min:3|max:100'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên thể loại',
            'name.unique' => 'Trung ten',
            'name.min' => 'Tên quá ngắn',
            'name.max' => 'Tên quá đài'
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->desc = $request->desc;

        $category->save();
        return redirect('admin/category/add')->with('message', 'Thêm thành công');
    }

    //  Sua danh muc
    public function getEdit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }
    public function postEdit(Request $request,$id){
        $category = Category::find($id);
        $this->validate($request,
            [
                'name' =>  'required|min:3|max:100'
            ],
            [
                'name.required'=>'Bạn chưa nhập tên thể loại',
                'name.unique' => 'Trung ten',
                'name.min' => 'Tên quá ngắn',
                'name.max' => 'Tên quá đài'
            ]);
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->save();
        return redirect('admin/category/edit/'.$id)->with('message', 'sửa danh mục thành công');
    }

    //  Xoa danh muc
    public function getDelete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect('admin/category/list')->with('message', 'xoa danh mục thành công');
    }
}
