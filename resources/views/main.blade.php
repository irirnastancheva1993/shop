@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <form method="post" action="http://localhost/shop/public/main">
                        {{ csrf_field() }}
                        <div class="panel-heading">
                   <span class="input-group-btn">
                       <button type="reset" class="btn btn-default">Сбросить</button>
                       <button type="submit" class="btn btn-default">Применить</button>
                    </span>
                        </div>
                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            Бренд</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            @foreach($brand as $item)
                                                <p>
                                                    <label>
                                                        <input type="checkbox" name="brand[]" value="{{ $item->value }}">{{ $item->value }}
                                                    </label>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            Количество скоростей</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            @foreach($count_v as $item)
                                                <label>
                                                    <input type="checkbox" name="count_v[]" value="{{ $item->value }}">{{ $item->value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            Диаметр колес</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            @foreach($diam as $item)
                                                <label>
                                                    <input type="checkbox" name="diam[]" value="{{ $item->value }}">{{ $item->value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            Вес</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            @foreach($m as $item)
                                                <label>
                                                    <input type="checkbox" name="m[]" value="{{ $item->value }}">{{ $item->value }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                            Материал</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <div class="checkbox">
                                            @foreach($material as $item)
                                                <p>
                                                    <label>
                                                        <input type="checkbox" name="material[]" value="{{ $item->value }}">{{ $item->value }}
                                                    </label>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                @if(count($goods) > 0)
                    @foreach($goods as $good)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail" style="height:350px;">
                                @for($i = 0; $i < count($images); $i++)
                                    {{--{{ var_dump($images[$i]['id'], $images[$i]['url'])}}--}}
                                    @if($images[$i]['id'] == $good->id)
                                        <img src="{{ $images[$i]['url'] }}" style="width:236px; height:191px;" >
                                    @endif

                                @endfor
                                <div class="caption">
                                    <h5>{{ $good->name }}</h5>
                                    <h6>{{ $good->price }}грн</h6>
                                    <p><a href="/shop/public/category/goods/{{ $good->id }}" class="btn btn-primary" role="button" style="position: absolute; bottom: 27px; align-items: center;">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div align="center">
                        {{ $goods->render() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
