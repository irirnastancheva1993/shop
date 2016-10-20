@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if(isset($empty))
                <h3>{{ $empty }}</h3>
            @else
                <div class="panel-heading"><h1>Выбранные товары:</h1></div>
                <form method="POST" class="form-horizontal" action="/shop/public/basket/update">
                    <table class="table table-condensed">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{ csrf_field() }}
                        @foreach($result as $key => $value)
                            <tr>
                                <input type="hidden" name="good_id[]" value="{{ $value['good_id'] }}">
                                <td>{{ $value['name'] }}</td>
                                <td>
                                    <select class="form-control" name="count[]">
                                        @for($i = 0; $i <= 4; $i++)
                                            <option value="{{$i}}" @if($value['count'] == $i) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="city" >Город:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1" name="city" required>
                                @foreach($city as $row)
                                    <option value="{{ $row->name }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="control-label col-sm-2" for="address" >Адрес:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Введите ваш адрес" required>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="count">Общая стоимость покупки составит:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="price" name="price" value="{{ $final_price }}" disabled>
                            <input type="hidden" name="price" value="{{ $final_price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <p class="add-re"><input type="submit" class="btn btn-primary" name="add" value="Готово" >
                            </p>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <p class="add-re"><input type="submit" class="btn btn-primary" name="update" value="Обновить" >
                            </p>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>

@endsection