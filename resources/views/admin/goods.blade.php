@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-11">
            @if (count($goods) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Все товары
                    </div>
                    <div class="panel-body">
                        @foreach ($goods as $good)

                            <form action="{{ url('admin/goods/'.$good->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="panel-heading">
                                    <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group{{ $errors->has('name'.$good->id) ? ' has-error' : '' }}">
                                            <label for="name" class="col-sm-2 control-label">Название:</label>
                                            <div class="col-sm-10">
                                                @if ($errors->has('name'.$good->id))
                                                    <input type="text" name="name{{$good->id}}" class="form-control" value="{{ old('name'.$good->id) }}">
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('name'.$good->id) }}</strong>
                                    </span>
                                                @else
                                                    <input type="text" name="name{{ $good->id }}" class="form-control" value="{{ $good->name }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group{{ $errors->has('price'.$good->id) ? ' has-error' : '' }}">
                                            <label for="price" class="col-sm-2 control-label">Цена:</label>
                                            <div class="col-sm-4">
                                                @if ($errors->has('price'.$good->id))
                                                    <input type="number" name="price{{$good->id}}" class="form-control" value="{{ old('price'.$good->id) }}">
                                                    <span class="help-block">
                                        <strong>{{ $errors->first('price'.$good->id) }}</strong>
                                    </span>
                                                @else
                                                    <input type="number" name="price{{ $good->id }}" class="form-control" value="{{ $good->price }}">
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fa fa-btn fa-trash"></i>
                                                    <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                                </button>
                                            </div>

                                            <div class="col-sm-3">
                                                <form action="{{ url('admin/goods/'.$good->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"  onclick=" return confirmDelete();">
                                                        <i class="fa fa-btn fa-trash"></i>
                                                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                                    </button>
                                                </form></div>

                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                <div class="panel-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('image'.$good->id) ? ' has-error' : '' }}">
                                        <label for="image" class="col-sm-4 control-label">Image:</label>
                                        <div class="col-sm-8">
                                            @if ($errors->has('image'.$good->id))
                                                <input type="url" name="image{{$good->id}}" class="form-control" value="{{ old('image'.$good->id) }}">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('image'.$good->id) }}</strong>
                                    </span>
                                            @else
                                                <input type="url" name="image{{ $good->id }}" class="form-control" value="{{ $good->image }}">
                                            @endif

                                        </div>
                                    </div>
                                   <img src="{{ $good->image }}" class="img-rounded" alt="Cinque Terre"  style="width:236px; height:191px;" >

                                        <div class="col-md-offset-3">
                                            <a href="http://localhost/shop/public/admin/goods/image/{{ $good->id }}" >
                                                <input type="hidden" name="good_id" value="{{$good->id}}">
                                                <button type="button" class="btn btn-default" >Добавить image</button>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                    <div class="form-group{{ $errors->has('description'.$good->id) ? ' has-error' : '' }}">
                                        <h5>Описание:</h5>
                                        <p>
                                        @if ($errors->has('description'.$good->id))
                                            <input type="text" name="description{{$good->id}}" class="form-control" value="{{ old('description'.$good->id) }}">
                                            <span class="help-block">
                                        <strong>{{ $errors->first('description'.$good->id) }}</strong>
                                    </span>
                                        @else
                                            <input type="text" name="description{{ $good->id }}" class="form-control" value="{{ $good->description }}">
                                        @endif
                                        </p>
                                    </div>

                                    <div class="form-group{{ $errors->has('article'.$good->id) ? ' has-error' : '' }}">
                                        <p>Код товара:</p>
                                        @if ($errors->has('article'.$good->id))
                                            <input type="number" name="article{{$good->id}}" class="form-control" value="{{ old('article'.$good->id) }}">
                                            <span class="help-block">
                                        <strong>{{ $errors->first('article'.$good->id) }}</strong>
                                    </span>
                                        @else
                                            <input type="number" name="article{{ $good->id }}" class="form-control" value="{{ $good->article }}">
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('count'.$good->id) ? ' has-error' : '' }}">
                                        <p>Количество товара: </p>
                                        @if ($errors->has('count'.$good->id))
                                            <input type="number" name="count{{$good->id}}" class="form-control" value="{{ old('count'.$good->id) }}">
                                            <span class="help-block">
                                        <strong>{{ $errors->first('count'.$good->id) }}</strong>
                                    </span>
                                        @else
                                            <input type="number" name="count{{ $good->id }}" class="form-control" value="{{ $good->count }}">
                                        @endif
                                    </div>

                                    <div class="form-group"><p>Категория</p>
                                        <select name="categories_id{{ $good->id }}" id="categories_id" class="form-control">

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"
                                                        @if($category->id == $good->categories_id) selected @endif>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    </div>
                                    <div>
                                        </div>
                                        </div>
                                    </div>
                            </form>
                            <hr>
                        @endforeach

                        <div align="center">
                            {{ $goods->render() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

