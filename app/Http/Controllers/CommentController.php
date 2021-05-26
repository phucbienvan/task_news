<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function getDelete($id, $news_id){
        $comment = Comment::find($id);
        $comment->delete();
        return redirect('admin/news/edit/'.$news_id)->with('message', 'xoa Bình luận thành công');
    }
}
