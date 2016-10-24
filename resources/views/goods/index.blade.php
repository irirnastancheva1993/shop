@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="panel panel-default">
            <nav class="breadcrumb">
                <a class="breadcrumb-item" href="/shop/public/category">Категории</a> >>
                <span class="breadcrumb-item">{{ $category->name }}</span>
            </nav>
            <div class="panel-body">
                <div class="row">
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
                                    <h4>{{ $good->name }}</h4>
                                    <h5>{{ $good->price }}грн</h5>
                                    <p><a href="/shop/public/category/goods/{{ $good->id }}" class="btn btn-primary" role="button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div align="center">
                    {{ $goods->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection


