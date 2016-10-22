@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <nav class="breadcrumb">
                    <a class="breadcrumb-item" href="/shop/public/category">Категории</a> >>
                    <a class="breadcrumb-item" href="/shop/public/category/{{ $category->id }}">{{ $category->name }}</a> >>
                    @foreach($good as $row)<span class="breadcrumb-item active">{{ $row->name }}</span>
                </nav>
                <div class="panel-body">
                    <form method="POST" action="/shop/public/orders/goods/{{ $id }}">
                        {{ csrf_field() }}

                        <h4>{{ $row->name }}</h4>
                        <img src="{{ $row->image }}" class="img-rounded" alt="Cinque Terre" width="236" height="191">
                        <h4>Цена за единицу товара:
                            {{ $row->price }}грн
                        </h4>
                        {{ $row->description }}
                        <p>Код товара:
                            {{ $row->article }}
                        </p>
                        <hr>
                        @endforeach
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="count" {{ $errors->has('count') ? ' has-error' : '' }}>Количество:</label>
                            <div class="col-xs-2" id="count">
                                <input type="number" class="form-control" name="count" min="1" max="100" required>
                                @if ($errors->has('count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <p class="add-re"><input type="submit" class="btn btn-primary" value="Добавить в корзину" @if(Auth::guest()) title="Вы должны зарегистрироваться или войти в свой аккаунт" disabled @endif>
                        </p>
                    </form>
                    @if(Auth::guest())
                        <h5 align="right" style="color:steelblue">@ Прежде чем добавить товар в корзину, вы должны зарегистрироваться или войти в свой аккаунт!</h5>
                    @endif
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4>Комментарии: </h4>
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
                            <p><input type="text" class="form-control" name="user_name" required>
                                @else <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                                @endif
                                <input type="hidden" name="goods_id" value="{{ $id }}">
                            <p><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Введите ваш комментарий:
                            <p><textarea  class="form-control" name="text" required></textarea></p>
                            <p class="add-re"><input type="submit" class="btn btn-primary" value="Добавить комментарий" ></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


