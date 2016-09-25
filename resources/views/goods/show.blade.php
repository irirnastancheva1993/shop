@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($good as $row)
                            <h2>{{ $row->name }}</h2>
                            <img src="{{ $row->image }}" class="img-rounded" alt="Cinque Terre" width="354" height="286">
                            <h3>
                                {{ $row->price }}грн
                            </h3>
                            {{ $row->description }}
                            <p>
                                {{ $row->article }}
                            </p>
                            <hr>
                        @endforeach
                    </div>
                </div>
<div class="container">
    <div class="col-md-6">

    </div>

</div>
                <form method="POST">
                    <p>Введите ваше имя:
                    <p><input type="text" class="form-control" name="name"></p>
                    </p>
                    <p>Введите ваш комментарий:
                    <p><textarea  class="form-control" name="text"> </textarea></p>
                    </p>
                    <p class="add-re">
                        <input type="submit" class="btn btn-primary" value="Добавить комментарий" >
                    </p>
                </form>
                </div>
                <div>
            </div>
        </div>
@endsection


