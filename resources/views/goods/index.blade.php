@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Велосипеды</h1></div>

                    <div class="panel-body">
                        @foreach($goods as $good)

                            <a href="goods/{{ $good->id }}"><h2>{{ $good->name }}</h2></a>
                            <img src="{{ $good->image }}" class="img-circle" alt="Cinque Terre" width="304" height="236">
                            <h3>
                                {{ $good->price }}грн
                            </h3>
                            <p>
                                {{ $good->description }}
                            </p>
                            <p>
                                {{ $good->article }}
                            </p>

                            <hr>

                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


