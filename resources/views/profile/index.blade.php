@extends('layouts.app')


@section('content')
    <link rel="stylesheet" href="/css/select2.css">
    <script src="/js/select2.js"></script>



    <div class="container">
        <div class="col-sm-9-centered">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('success') }}
                </div>
            @endif
            <form method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <input type="text" name="title" class="form-control" placeholder="Enter your post title">
                            @if ($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                          <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group {{ $errors->has('body') ? 'has-error' : '' }}">
                            <textarea name="body" rows="2" cols="80" class="form-control" placeholder="Enter your post"></textarea>
                            @if ($errors->has('body'))
                                <small class="text-danger">{{ $errors->first('body') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                          <select class="form-control" name="category">
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ucwords(trans($category->name)) }}</option>
                              @endforeach
                          </select>
                        </div>
                        <input type="submit" value="Post" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>

            @foreach ($posts as $post)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h2 class="panel-title">
                        <strong>{{ $post->title }}</strong> - Created by {{ $post->user['username'] }}
                        <div class="pull-right">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ route('post.show', [$post->id]) }}">Show Post</a></li>
                                    <li><a href="{{ route('post.edit', [$post->id]) }}">Edit Post</a></li>
                                    <li>
                                        <a href="#" onclick="document.getElementById('delete').submit()">Delete Post</a>
                                        {!! Form::open(['method' => 'DELETE', 'id' => 'delete', 'route' => ['post.delete', $post->id]]) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </h2>
                  </div>
                    <div class="panel-body">
                      {{ $post->body }}
                      <br/>
                      <br/>
                      @if ($post->image != null)
                          <img src="/images/{{ $post->image }}" class="img-responsive center-block" alt="Image" width="95%" height="500%">
                      @endif
                      <br/>
                      <br/>
                      Category: <div class="badge">{{ ucwords(trans($post->category['name'])) }}</div>
                    </div>
                  <div class="panel-footer" data-postid="{{ $post->id }}">
                      @php
                          $i = Auth::user()->likes()->count();
                          $c = 1;
                          $likeCount = $post->likes()->where('like', '=', true)->count();
                          $dislikeCount = $post->likes()->where('like', '=', false)->count();
                      @endphp
                      @foreach (Auth::user()->likes as $like)
                          @if ($like->post_id == $post->id)
                              @if ($like->like)
                                  <a href="#" class="btn btn-link like active-like">Like <span class="badge">{{ $likeCount }}</span></a>
                                  <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                              @else
                                  <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                                  <a href="#" class="btn btn-link like active-like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                              @endif
                              @break
                          @elseif ($i == $c)
                              <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                              <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                          @endif
                          @php
                              $c++;
                          @endphp
                      @endforeach
                      @if ($i == 0)
                          <a href="#" class="btn btn-link like">Like <span class="badge">{{ $likeCount }}</span></a>
                          <a href="#" class="btn btn-link like">Dislike <span class="badge">{{ $dislikeCount }}</span></a>
                      @endif
                      <a href="{{ route('post.show', [$post->id]) }}" class="btn btn-link">Comment</a>
                  </div>
                </div>
            @endforeach
        </div>

    </div>
    <script type="text/javascript">
        $('.select2-class').select2();
    </script>
@endsection