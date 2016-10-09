@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавить нового пользователя:
                </div>
                <div class="panel-body">
                @include('admin.errors')
                    <form action="{{ url('admin/users')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Имя пользователя:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-8">
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
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
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <td class="table-text"><div>
                                                <input type="text" name="name" value="{{ $user->name }}">
                                            </div></td>
                                        <td class="table-text"><div>
                                                <input type="text" name="email" value="{{ $user->email }}">
                                            </div></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Изменить
                                            </button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Удалить
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

