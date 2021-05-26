<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getList(){
        $user = User::all();
        return view('admin.user.list', compact('user'));
    }
    public function getAdd(){

        return view('admin.user.add');
    }
    public function postAdd(Request $request){
        $this->validate($request,
            [

                'name'=>'required|unique:news,name',
                'email'=>'required',
                'password'=>'required'
            ],
            [

                'name.required' => 'Bạn chưa nhập tiêu đề',
                'name.unique' => 'Tiêu đề đã tồn tại',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mat khau '
            ]);
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;

//
//        var_dump($news);
//        die();
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            if ($path != 'jpg' && $path != 'png') {
                return redirect('admin/user/add')->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("uploads/news/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("uploads/users", $image);
            $user->image = $image;
        }else{
            $user->image = "";
        }
        $user->save();
        return redirect('admin/user/add')->with('message', 'Thêm thành công');
    }

    // Chinh sua user
    public function getEdit($id){
        $user = User::find($id);

        return view('admin.user.edit', compact('user'));
    }

    public function postEdit(Request $request, $id)
    {
        $user = User::find($id);

        $this->validate($request,
            [

                'name' => 'required|',
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'name.required' => 'Bạn chưa nhập tiêu đề',

                'email.required' => 'Bạn chưa nhập email ',
                'password.required' => 'Bạn chưa nhập mat khau'
            ]);


        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->level = $request->level;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->getClientOriginalExtension();
            //  kiem tra duoi file
            if ($path != 'jpg' && $path != 'png') {
                return redirect('admin/user/add')->with('message', 'Bạn phải chọn file ảnh');
            }
            $name = $file->getClientOriginalName();
            $image = str_random(4) . "_" . $name;

            // Tranh trung ten image
            while (file_exists("uploads/users/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("uploads/users", $image);

            unlink("uploads/slides/" . $user->image); //xoa hinh cu
            $user->image = $image;
        }


        $user->save();

        return redirect('admin/user/edit/'.$id)->with('message', 'Sửa user thành công');
    }

    // Xoa user
    public function getDelete($id){
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user/list')->with('message', 'xoa user thành công');
    }

    public function getLoginAdmin(){
        return view('admin.login');
    }
}
