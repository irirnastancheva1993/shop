@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-11">
            <div class="panel panel-default">
                @if (Session::has('message_create_good'))
                    <div class="alert alert-info">{{ Session::get('message_create_good') }}</div>
                @endif
                <div class="panel-heading">
                    Форма добавления товара:
                </div>
                <div class="panel-body">
                    {{--@include('admin.errors')--}}
                    <form action="{{ url('admin/goods/add')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Название:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-sm-2 control-label">Цена:</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" value="{{ old('price') }}" id="price" class="form-control" required>
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                            <label for="image" class="col-sm-2 control-label">Ссылка на изображение:</label>
                            <div class="col-sm-10">
                                <input type="url" name="image" value="{{ old('image') }}" id="image" class="form-control" required>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-2 control-label">Описание:</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" value="{{ old('description') }}" id="description" class="form-control" required>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('article') ? ' has-error' : '' }}">
                            <label for="article" class="col-sm-2 control-label">Код товара:</label>
                            <div class="col-sm-10">
                                <input type="number" name="article" value="{{ old('article') }}" id="article" class="form-control" required>
                                @if ($errors->has('article'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('article') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('count') ? ' has-error' : '' }}">
                            <label for="count" class="col-sm-2 control-label">Количество товара на складе:</label>
                            <div class="col-sm-10">
                                <input type="number" name="count" value="{{ old('count') }}" id="count" class="form-control" required>
                                @if ($errors->has('count'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categories_id" class="col-sm-2 control-label">Категория:</label>
                            <div class="col-sm-10">
                                <select name="categories_id" value="{{ old('categories_id') }}" id="categories_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection