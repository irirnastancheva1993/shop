@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                    Результат поиска по полям:</a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @foreach($filtr as $name => $item)
                                    <ul><strong><h5>
                                                {{ $name }}
                                            </h5>
                                        </strong>
                                        @for($i = 0; $i < count($item); $i++)
                                            <p>
                                                {{ $item[$i] }}
                                            </p>
                                        @endfor
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
            </div>
                </div>
            <div class="col-md-9">
                @if(count($goods_result) > 0)
                    @foreach($goods_result as $i => $good_result)
                        @foreach($goods_result[$i] as $key => $good)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail" style="height:350px;">
                                    @foreach($images as $img => $j)
                                        {{--{{ var_dump($images[$i]['id'], $images[$i]['url'])}}--}}
                                        @if($images[$img]['id'] == $goods_result[$i][$key]->id)
                                            <img src="{{ $images[$img]['url'] }}" style="width:236px; height:191px;" >
                                        @endif
                                    @endforeach
                                    <div class="caption">
                                        <h5>{{ $goods_result[$i][$key]->name }}</h5>
                                        <h6>{{ $goods_result[$i][$key]->price }}грн</h6>
                                        <p><a href="/shop/public/category/goods/{{ $goods_result[$i][$key]->id }}" class="btn btn-primary" role="button" style="position: absolute; bottom: 27px; align-items: center;">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
