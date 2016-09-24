@extends('layouts.app')
@section('content')
    <h2>{{$card->title}}</h2>
    <ul>
        @foreach($card->notes as $note)
            <li>{{$note->body}}</li>
        @endforeach
    </ul>
@endsection