<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //  Danh sách tin tức
    public function getList(){
        $news = News::orderBy('id', 'DESC')->get();
        return view('admin.news.list', compact('news'));
    }

    //  Them tin tuc
    public function getAdd(){
        $category = Category::all();
        return view('admin.news.add', compact('category'));
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [

                'name'=>'required|unique:news,name',
                'desc'=>'required',
                'contents'=>'required'
            ],
            [

                'name.required' => 'Bạn chưa nhập tiêu đề',
                'name.unique' => 'Tiêu đề đã tồn tại',
                'desc.required' => 'Bạn chưa nhập tiêu đề',
                'contents.required' => 'Bạn chưa nhập nội dung'
            ]);
        $news = new News();
        $news->category_id = $request->category;
        $news->name = $request->name;
        $news->desc = $request->desc;
        $news->contents = $request->contents;
        $news->status = $request->status;
        $news->views = 0;
//
//        var_dump($news);
//        die();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            if ($path != 'jpg' && $path != 'png'){
                return redirect('admin/category/add')->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4)."_".$name;
        }
        // Tranh trung ten image
        while (file_exists("uploads/news/".$image)){
            $image = str_random(4)."_".$name;
        }
        $file->move("uploads/news", $image);
        $news->image = $image;

        $news->save();
        return redirect('admin/category/add')->with('message', 'Thêm thành công');
    }

    //  Xoa tin tuc
    public function getDelete($id){
        $news = News::find($id);
        $news->delete();
        return redirect('admin/news/list')->with('message', 'xoa tin tuc thành công');
    }
}
