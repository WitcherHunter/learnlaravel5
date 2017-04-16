@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑文章</div>
                <div class="panel-body">
                	@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                    <form action="{{ url('admin/article/'.$article->id) }}" method="post">
                        {{ method_field('PATCH') }}
                        {{csrf_field()}}
                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题" value="{{ $article->title }}">
                        <br>
                        <textarea name="body" id="article-body" rows="10" required="required" class="form-control" placeholder="请输入内容">{{ $article->body }}</textarea>
                        <br>
                        <button class="btn btn-lg btn-info">提交修改</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection