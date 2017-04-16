<?php

namespace App\Http\Controllers\Admin;

use Validator;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
        return view('admin.comment.index')->withComments(Comment::all());
    }

    public function edit($id){
        return view('admin.comment.edit')->withComment(Comment::find($id));
    }

    public function update(Request $request,$id){
        $validator = Validator::make($request->all(),[
            'content' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors('更新失败');
        }

        $comment = Comment::find($id);
        $comment->nickname = $request->nickname;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->content = $request->get('content');

        if ($comment->save()){
            return redirect('admin/comment')->withErrors('更新成功');
        }else{
            return redirect()->back()->withInput()->withErrors('更新失败');
        }
    }

    public function destroy($id){
        Comment::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功');
    }
}
