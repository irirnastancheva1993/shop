@extends('admin.layouts')
@section('content')
        <div class="col-sm-11">
            <div class="panel panel-default">
                @if (Session::has('message_create_user'))
                    <div class="alert alert-info">{{ Session::get('message_create_user') }}</div>
                @endif
                <div class="panel-heading">
                    Форма добавления нового пользователя:
                </div>
                <div class="panel-body">
                    {{--@include('admin.errors')--}}
                    <form action="{{ url('admin/users/add')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-2 control-label" >Имя пользователя:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" class="form-control" required>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email" class="form-control" required>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
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

@endsection

