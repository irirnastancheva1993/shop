@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                        <nav class="breadcrumb">
                            <a class="breadcrumb-item" href="/shop/public/category">Категории</a> >>
                            <span class="breadcrumb-item">{{ $category->name }}</span>
                        </nav>
                    <div class="panel-body">
                        @foreach($goods as $good)
                            <a href="/shop/public/category/goods/{{ $good->id }}"><h4>{{ $good->name }}</h4></a>
                            <img src="{{ $good->image }}" class="img-rounded" alt="Cinque Terre" width="236" height="191">
                            <h4>
                                {{ $good->price }}грн
                            </h4>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


