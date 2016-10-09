@extends('admin.layouts')
@section('content')
    <div class="container">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Добавить товар:
                </div>
                <div class="panel-body">
                @include('admin.errors')
                    <form action="{{ url('admin/goods')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Название:</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="col-sm-2 control-label">Цена:</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" id="price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Ссылка на изображение:</label>
                            <div class="col-sm-10">
                                <input type="url" name="image" id="image" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Описание:</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="article" class="col-sm-2 control-label">Код товара:</label>
                            <div class="col-sm-10">
                                <input type="number" name="article" id="article" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Добавить
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
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
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
                                        <td>
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Изменить
                                            </button></td>
                                    </form>

                                    <td>
                                        <form action="{{ url('admin/goods/'.$good->id) }}" method="POST">
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

