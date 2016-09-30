@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Добавление товара в корзину:</h1></div>
                    <div class="panel-body">
                        <form method="POST" class="form-horizontal" action="/shop/public/orders/goods/add">
                            {{ csrf_field() }}
                            @foreach($orders->goods as $good)
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="name">Название товара</label>
                                    <div class="col-sm-10">
                                        <b>{{ $good->name }}</b>
                                    </div>
                                </div>
                            @endforeach
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
                                        <input type="text" class="form-control" id="price" value="{{ $orders->price }}" disabled>
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
            </div>
        </div>
    </div>
@endsection