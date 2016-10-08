@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                        <nav class="breadcrumb">
                            <span class="breadcrumb-item">Категории велосипедов:</span>
                        </nav>
                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($categories as $category)
                                <li class="list-group-item">
                                    <a href="/shop/public/category/{{ $category->id }}"><h5>{{ $category->name }}</h5></a>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


