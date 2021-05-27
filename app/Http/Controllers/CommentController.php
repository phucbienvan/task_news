<?php

namespace App\Http\Controllers;

use App\Comment;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getDelete($id, $newsId){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/news/edit/'.$newsId)->with('message', 'xoa Bình luận thành công');
    }

    public function postComment($newsId,Request $request){
        $this->validate($request,
            [
                'contents' => 'required'
            ],
            [
                'contents.required' => 'Bạn chưa nhập nội dung'
            ]);
        $news = News::find($newsId);
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->news_id = $newsId;
        $comment->category_id= $news->category_id;
        $comment->contents = $request->contents;
        $comment->save();

        return redirect('news/'.$news->id)->with('message','Bình Luận đã được đăng!');
    }
}
