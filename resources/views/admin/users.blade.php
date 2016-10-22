@extends('admin.layouts')
@section('content')
    <div class="col-sm-11">
        @if (count($users) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Все пользователи
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Пользователи:</th>
                        <th>Email:</th>
                        <th>Пароль:</th>
                        <th>Обновить</th>
                        <th>Удалить</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <td class="table-text">
                                        <div class="form-group{{ $errors->has('name'.$user->id) ? ' has-error' : '' }}">
                                            @if ($errors->has('name'.$user->id))
                                                <input type="text" name="name{{$user->id}}" class="form-control" value="{{ old('name'.$user->id) }}">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name'.$user->id) }}</strong>
                                    </span>
                                            @else
                                                <input type="text" name="name{{ $user->id }}" class="form-control" value="{{ $user->name }}">
                                            @endif
                                        </div>
                                    </td>

                                    <td class="table-text">
                                        <div class="form-group{{ $errors->has('email'.$user->id) ? ' has-error' : '' }}">
                                            @if ($errors->has('email'.$user->id))
                                                <input type="text" name="email{{$user->id}}" class="form-control" value="{{ old('email'.$user->id) }}">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email'.$user->id) }}</strong>
                                    </span>
                                            @else
                                                <input type="text" name="email{{ $user->id }}" class="form-control" value="{{ $user->email }}">
                                            @endif
                                        </div>
                                    </td>

                                    <td class="table-text">
                                        <div class="form-group{{ $errors->has('password'.$user->id) ? ' has-error' : '' }}">
                                            @if ($errors->has('password'.$user->id))
                                                <input type="text" name="password{{$user->id}}" class="form-control" value="{{ old('password'.$user->id) }}">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password'.$user->id) }}</strong>
                                    </span>
                                            @else
                                                <input type="text" name="password{{ $user->id }}" class="form-control" value="{{ $user->password }}">
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-success">
                                            <i class="fa fa-btn fa-trash"></i>
                                            <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                                        </button>
                                    </td>
                                </form>
                                <td>
                                    <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger" onclick="return confirmDelete();">
                                            <i class="fa fa-btn fa-trash"></i>
                                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div align="center">
                        {{ $users->render() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

