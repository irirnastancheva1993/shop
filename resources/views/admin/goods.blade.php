@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавить товар:
                </div>
                <div class="panel-body">
                    {{--@include('admin.errors')--}}
                    <form action="{{ url('admin/goods')}}" method="POST" class="form-horizontal">
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

            <!-- Current Tasks -->
            @if (count($goods) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Все товары
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Товар:</th>
                            <th>Цена:</th>
                            <th>Ссылка на изображение:</th>
                            <th>Категория:</th>
                            <th>Обновить</th>
                            <th>Удалить</th>
                            </thead>
                            <tbody>
                            @foreach ($goods as $good)
                                <tr>
                                    <form action="{{ url('admin/goods/'.$good->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <td class="table-text"><div>
                                                <input type="text" name="name" value="{{ $good->name }}">
                                            </div></td>
                                        <td class="table-text"><div>
                                                <input type="number" name="price" value="{{ $good->price }}">
                                            </div></td>
                                        <td class="table-text"><div>
                                                <input type="url" name="image" value="{{ $good->image }}">
                                            </div></td>
                                        <td class="table-text"><div>
                                                <select name="categories_id" id="categories_id" class="form-control">
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                                @if($category->id == $good->categories_id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div></td>
                                        <td>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-btn fa-trash"></i>
                                                <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                            </button></td>
                                    </form>

                                    <td>
                                        <form action="{{ url('admin/goods/'.$good->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger"  onclick=" return confirmDelete();">

                                                <i class="fa fa-btn fa-trash"></i>
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

