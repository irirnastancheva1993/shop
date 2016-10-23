@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="alert alert-info">
            <strong>Работает!</strong>
            <p>Смотрите ниже ;)</p>
        </div>
        <div class="alert alert-success">
            <strong>Результат поиска!</strong>
            @foreach($goods as $good)
                <p><a href="http://localhost/shop/public/category/goods/{{ $good->id }}">{{ $good->name }}</a></p>
                @endforeach
        </div>
    </div>
    @endsection