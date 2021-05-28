<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function getList(){
        $slide = Slide::all();
        return view("admin/slide/list", compact('slide'));
    }
    public function getAdd(){

        return view('admin.slide.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [
                'name'=>'required|unique:news,name',
                'desc'=>'required',
                'link'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tiêu đề',
                'name.unique' => 'Tiêu đề đã tồn tại',
                'desc.required' => 'Bạn chưa nhập tiêu đề',
                'link.required' => 'Bạn chưa nhập nội dung'
            ]);
        $slide = new Slide();
        $slide->name = $request->name;
        $slide->desc = $request->desc;
        $slide->link = $request->link;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            if ($path != 'jpg' && $path != 'png') {
                return redirect()->back()->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("uploads/news/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("uploads/slides", $image);
            $slide->image = $image;
        }else{
            $slide->image = "";
        }
        $slide->save();
        return redirect()->back()->with('message', 'Thêm thành công');
    }

    //  chinh sua slide
    public function getEdit($id){
        $slide = Slide::find($id);
        return view('admin.slide.edit', compact('slide'));
    }

    public function postEdit(Request $request, $id){
        $slide = Slide::find($id);
        $this->validate($request,
            [
                'name'=>'required|',
                'desc'=>'required',
                'link'=>'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tiêu đề',

                'desc.required' => 'Bạn chưa nhập mô tả ',
                'link.required' => 'Bạn chưa nhập link'
            ]);
        $slide->name = $request->name;
        $slide->desc = $request->desc;
        $slide->link = $request->link;

        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            $fileHopLe = ['png', 'jpg', 'jepg'];
            if($path != $fileHopLe){
                return redirect()->back()->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("uploads/news/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("uploads/slides", $image);
            unlink("uploads/slides/".$slide->image); //xoa hinh cu
            $slide->image = $image;
        }
        $slide->save();
        return redirect()->back()->with('message', 'Sửa slide thành công');
    }
    public function getDelete($id){
        $slide = Slide::find($id);

        $slide->delete();
        return redirect()->back()->with('message', 'xoa slide thành công');
    }

}
