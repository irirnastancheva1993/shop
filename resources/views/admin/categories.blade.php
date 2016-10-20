@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавить категорию:
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                {{--@include('admin.errors')--}}

                <!-- New Task Form -->
                    <form action="{{ url('admin/categories')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Name -->
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

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-plus"></i>Добавить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($categories) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Все категории
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Категория:</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <td class="table-text"><div>
                                                <input type="text" name="name" value="{{ $category->name }}">
                                            </div>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-success">
                                                <i class="fa fa-btn fa-trash"></i>Изменить
                                            </button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
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

