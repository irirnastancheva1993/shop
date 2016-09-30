@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form method="POST" action="/shop/public/orders/goods/{{ $id }}">
                        {{ csrf_field() }}
                    @foreach($good as $row)
                        <h2>{{ $row->name }}</h2>
                        <img src="{{ $row->image }}" class="img-rounded" alt="Cinque Terre" width="354" height="286">
                        <h3>Цена за единицу товара:
                            {{ $row->price }}грн
                        </h3>
                        {{ $row->description }}
                        <p>Код товара:
                            {{ $row->article }}
                        </p>
                        <hr>
                    @endforeach
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="count">Количество:</label>
                            <div class="col-xs-2" id="count">
                                <select class="form-control" name="count">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                            <p class="add-re"><input type="submit" class="btn btn-primary" value="Добавить в корзину" >
                            </p>
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


