@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-11">
            <div class="panel panel-default">
                @if (Session::has('message_create_image'))
                    <div class="alert alert-info">{{ Session::get('message_create_image') }}</div>
                @endif
                <div class="panel-heading">
                    Форма добавления картинки:
                </div>
                <div class="panel-body">
                    {{--@include('admin.errors')--}}

                    {{--{{ var_dump($url =Request::url() ) }}--}}
                    {{--{{ die }}--}}

                    <form action="{{ Request::url() }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">

                            <label for="url" class="col-sm-2 control-label">Ссылка на изображение:</label>
                            <div class="col-sm-10">
                                <input type="url" name="url" value="{{ old('url') }}" id="url" class="form-control" required>
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Загрузить изображение
                                </button>
                            </div>
                        </div>
                    </form>
                    <hr>

                    @foreach($images as $image)
                        {{--{{ var_dump($image) }}}--}}
                    {{--{{ die }}--}}
                    <div class="content">
                        <form action="{{ url('admin/goods/image/'.$image->goods_id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $image->url }}" class="img-rounded" alt="Cinque Terre"  style="width:236px; height:191px;" >
                                    {{--<div class="col-sm-3">--}}

                                    {{--</div>--}}
                                </div>

                                <div class="col-md-6" style="width:236px; height:191px;">
                                    <div class="form-group{{ $errors->has('url'.$image->id) ? ' has-error' : '' }}">
                                        <label for="url{{ $image->id }}" class="col-sm-4 control-label"></label>
                                        @if ($errors->has('url'.$image->id))
                                            <input type="url" name="url{{$image->id}}" class="form-control" value="{{ old('url'.$image->id) }}">
                                            <span class="help-block">
                                        <strong>{{ $errors->first('url'.$image->id) }}</strong>
                                    </span>
                                        @else
                                            <input type="url" name="url{{ $image->id }}" class="form-control" value="{{ $image->url }}">
                                        @endif
                                    </div>
                                    <form action="{{ url('admin/goods/image/'.$image->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-default"  onclick=" return confirmDelete();">
                                            <i class="fa fa-btn fa-trash"></i>
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"> Удалить</span>
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </form>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection