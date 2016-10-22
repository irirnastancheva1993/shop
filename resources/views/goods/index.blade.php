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
                            <div class="thumbnail" height="300">
                                <img src="{{ $good->image }}" width="236" height="191">
                                <div class="caption">
                                    <h4>{{ $good->name }}</h4>
                                    <h5>{{ $good->price }}грн</h5>
                                    <p><a href="/shop/public/category/goods/{{ $good->id }}" class="btn btn-primary" role="button">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection


