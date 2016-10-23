@extends('admin.layouts')
@section('content')
    <div class="col-sm-11">
        <div class="panel panel-default">
            @if (Session::has('message_create_category'))
                <div class="alert alert-info">{{ Session::get('message_create_category') }}</div>
            @endif
                <div class="panel-heading">
                    Добавить категорию:
                </div>

                <div class="panel-body">
                    <form action="{{ url('admin/categories/add')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label">Название категории:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
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