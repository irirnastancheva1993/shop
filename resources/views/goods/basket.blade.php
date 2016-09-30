@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel-heading"><h1>Выбранные товары:</h1></div>
            <form method="POST" class="form-horizontal" action="/shop/public/basket">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Выбранные</th>
                    <th>Название</th>
                    <th>Количество</th>
                </tr>
                </thead>
                <tbody>
                    {{ csrf_field() }}
                    @foreach($result as $key => $value)
                    <tr>
                        <td><div class="checkbox">
                                <label><input type="checkbox" value="yes"></label>
                            </div></td>
                        <td>{{ $value['name'] }}</td>
                        <td>{{ $value['count'] }}</td>
                    </tr>
                @endforeach
            </table>
            <div class="form-group">
                <label class="control-label col-sm-2" for="city">Город:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="sel1">
                        @foreach($city as $row)
                            <option name="city" value="{{ $row->name }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="address">Адрес:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="address" placeholder="Введите ваш адрес">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="count">Общая стоимость покупки составит:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" value="{{ $final_price }}" disabled>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <p class="add-re"><input type="submit" class="btn btn-primary" name="add" value="Готово" >
                    </p>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection