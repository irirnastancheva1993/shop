@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>{{$card->title}}</h2>
            <ul class="list-group">
                @foreach($card->notes as $note)
                    <li class="list-group-item">{{$note->body}}</li>
                @endforeach
            </ul>
            <hr>
            <h3>Add a New Note</h3>
            <form method="POST" action="/shop/public/cards/{{ $card->id }}/notes">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="body">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" >Add Note</button>
                </div>
            </form>
        </div>
    </div>

@endsection