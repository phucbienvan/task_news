<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\News;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function __construct()
    {
        $data = [
            'category' => Category::all(),
            'slide' => Slide::all()
        ];
        view()->share('data',$data);


    }

    public function home(){
        $news = News::all();
        $newsOrther = News::where('status', '>', 0)->paginate(4);
        return view('pages.home', compact('news', 'newsOrther'));
    }

    public function contact(){

        return view('pages.contact');
    }

    public function category($id){
//        $category = Category::where('id',$id)->first();
        $news = News::where('category_id',$id)->paginate(5);
        return view('pages.category',compact( 'news'));
    }

    public function news($id){
        $news = News::where('id',$id)->first();
        return view('pages.detail', compact('news'));
    }

    public function getLogin(){
        return view('pages.login');
    }

    public function postLogin(Request $request){
        $this->validate($request,
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Bạn chưa nhập email ',
                'password.required' => 'Bạn chưa nhập mat khau'
            ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed...
            return redirect('/'   );
        }
        else
            return redirect('dang-nhap')->with('message','Đăng Nhập không thành công!');

    }


    // Dang xuat
    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }

    public function getCustomer(){
        if(Auth::check())
            return view('pages.customer',['customer' => Auth::user()]);
        else
            return redirect('dang-nhap')->with('message','Bạn chưa Đăng Nhập!');
    }

    public function postCustomer(Request $request)
    {


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
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);


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

            unlink("uploads/users/" . $user->image); //xoa hinh cu
            $user->image = $image;
        }
        $user->save();

        return redirect('customer')->with('message', 'Sửa nguoi dung thành công');
    }


    // dang ki nguoi dung
    public function getRegister(){
        return view('pages.dangki');
    }
    public function postRegister(Request $request){
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
        $user->password = bcrypt($request->password);
        $user->level= 0;

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
            while (file_exists("uploads/users/" . $image)) {
                $image = str_random(4) . "_" . $name;
            }
            $file->move("uploads/users", $image);
            $user->image = $image;
        }else{
            $user->image = "";
        }
        $user->save();
        return redirect('dang-nhap')->with('message', 'Thêm thành công');
    }
}
