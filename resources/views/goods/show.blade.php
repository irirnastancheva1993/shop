@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="/shop/public/category/goods/{{ $id }}/add">
                        {{ csrf_field() }}
                    @foreach($good as $row)
                        <h2>{{ $row->name }}</h2>
                        <img src="{{ $row->image }}" class="img-rounded" alt="Cinque Terre" width="354" height="286">
                        <h3>
                            {{ $row->price }}грн
                        </h3>
                        {{ $row->description }}
                        <p>
                            {{ $row->article }}
                        </p>
                        <hr>
                    @endforeach
                        <p class="add-re"><input type="submit" class="btn btn-primary" name="add" value="Добавить в корзину" >
                        <input type="submit" class="btn btn-primary" name="buy" value="Купить" ></p>
                    </form>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Комментарии: </h2>
                    @foreach($comments as $comment)
                        <div class="media">
                            <div class="media-left">
                                <img src="/shop/public/images/icon/essential/user.png" class="media-object" style="width:45px">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">{{ $comment->user_name }} <small><i> {{ $comment->created_at }}</i></small></h4>
                                <p>{{ $comment->text }}</p>
                            </div>
                        </div>
                    @endforeach
                    <form method="POST" action="/shop/public/category/goods/{{ $id }}/edit">
                        {{ csrf_field() }}
                        @if(Auth::guest())
                            <p>Введите ваше имя:</p>
                            <p><input type="text" class="form-control" name="user_name">
                        @else <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                            @endif
                        <input type="hidden" name="goods_id" value="{{ $id }}">
                        <p>Введите ваш комментарий:
                        <p><textarea  class="form-control" name="text"></textarea></p>
                        <p class="add-re"><input type="submit" class="btn btn-primary" value="Добавить комментарий" ></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


