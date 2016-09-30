@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Добавление товара в корзину:</h1></div>
                    <div class="panel-body">
                        @foreach($good as $row)
                        <form method="POST" class="form-horizontal" action="/shop/public/orders/goods/{{ $row->id }}/add">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label class="control-label col-sm-2" for="name"><b>{{ $row->name }}</b></label>
                                    <div class="col-sm-10">
                                        <img src="{{ $row->image }}" class="img-rounded" alt="Cinque Terre" width="177" height="143">
                                    </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="price">Цена за единицу(грн):</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="price" value="{{ $row->price }}" disabled>
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="article">Код товара:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="article" value="{{ $row->article }}" disabled>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-2" for="count">Количество:</label>
                                    <div class="col-sm-10">
                                            <select class="form-control" name="count">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                    </div>
                                </div>
                            @endforeach
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