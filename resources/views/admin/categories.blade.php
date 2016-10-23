@extends('admin.layouts')
@section('content')
    <div class="col-sm-11">
        @if (count($categories) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    Все категории
                </div>
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Категория:</th>
                        <th>Обновить</th>
                        <th>Удалить</th>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <td class="table-text">
                                        <div class="form-group{{ $errors->has('name'.$category->id) ? ' has-error' : '' }}">
                                            @if ($errors->has('name'.$category->id))
                                                <input type="text" name="name{{$category->id}}" class="form-control" value="{{ old('name'.$category->id) }}">
                                                <span class="help-block">
                                        <strong>{{ $errors->first('name'.$category->id) }}</strong>
                                    </span>
                                            @else
                                                <input type="text" name="name{{ $category->id }}" class="form-control" value="{{ $category->name }}">
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
                                    <form action="{{ url('admin/categories/'.$category->id) }}" method="POST">
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
                        {{ $categories->render() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

