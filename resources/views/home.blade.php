@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        @foreach($articles as $article)
                            <article class="format-image group">
                                <h2 class="post-title pad">
                                    <a href="/article/{{ $article->id }}"> {{ $article->title }}</a>
                                </h2>
                                <div class="post-inner">
                                    <div class="post-deco">
                                        <div class="hex hex-small">
                                            <div class="hex-inner"><i class="fa"></i></div>
                                            <div class="corner-1"></div>
                                            <div class="corner-2"></div>
                                        </div>
                                    </div>
                                    <div class="post-content pad">
                                        <div class="entry custome">
                                            {{ $article->intro }}
                                        </div>
                                        <a class="more-link-custom" href="/article/{{ $article->id }}"><span><i>更多</i></span></a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
