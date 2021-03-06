<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller {
    public function index() {
        return view('admin/article/index')->withArticles(Article::all());
    }

    public function create() {
        return view('admin/article/create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:articles|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->user_id = $request->user()->id;

        if ($article->save()) {
            return redirect('admin/article');
        } else {
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id) {
        return view('admin/article/edit')->withArticle(Article::find($id));
    }

    public function update(Request $request,$id) {
        $validator = Validator::make($request->all(),[
           'title' => 'required|unique:articles,title,'.$id.'|max:255',
            'body' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->withInput()->withErrors('更新失败');
        }

        $article = Article::find($id);
        $article->title = $request->title;
        $article->body = $request->body;

        if ($article->save()){
            return redirect('admin/article');
        }else{
            return redirect()->back()->withInput()->withErrors('更新失败');
        }
    }

    public function destroy($id) {
        Article::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}
